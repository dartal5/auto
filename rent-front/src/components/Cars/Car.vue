<template>
  <v-container grid-list-lg fluid>
    <v-layout row wrap>
      <v-flex sm12>

          <h1 class="car-title">Інформація</h1>
        
      </v-flex>
      <v-flex
        md4
      >
        <v-card>
          <v-card-media :src="carById.picture" height="200px">
          </v-card-media>
          <v-card-title primary-title>
            <div>
              <h3 class="">{{ carById.make + ' ' + carById.model }}</h3>
              <div>{{ carById.info }}</div>
            </div>
          </v-card-title>
          <v-form ref="form" v-model="valid">
            <div class="select-wrap">
              <v-select
                :items="selectItems"
                v-model="selectPicker"
                label="Оберіть ціль"
                :rules="reqRule"
                class="input-group--focused"
                item-value="value"
                item-text="text"
              ></v-select>
            </div>
            <div class="date-wrap">
              <div class="date-title">
                Дата з:
              </div>
              <v-date-picker
                class="mb-4"
                v-model="datePickerFrom" 
                full-width
                :min="minDate"
              ></v-date-picker>
              <div class="date-title">
                Дата по:
              </div>
              <v-date-picker
                v-model="datePickerTo" 
                full-width
                :min="datePickerFrom"
              ></v-date-picker>
              <transition name="fade">
                <div class="error-message" name="fade" v-if="errorMsg">
                  Ціль та дата початку оренди - обовязкові!
                </div>
              </transition>
             
            </div>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn
                :to="'/car/' + carById.id" 
                :disabled="!carById.status" 
                color="success"
                @click.native.stop="firstFormClick"
              >Замовити</v-btn>
            </v-card-actions>
          </v-form>

            <v-dialog v-model="dialog" max-width="400">
              
              <v-card>
                <v-form 
                  class="pl-3 pr-3"
                  v-model="valid2"
                >
                  <v-text-field
                    v-model="name"
                    label="Name"
                    :rules="reqRule"
                    required
                  ></v-text-field>
                  <v-text-field
                    v-model="email"
                    :rules="emailRules"
                    label="E-mail"
                    required
                  ></v-text-field>
                   <v-select
                    :items="driveCats"
                    v-model="selectDrive"
                    label="Водійське посвідчення"
                    single-line
                     :rules="reqRule"
                    required
                  ></v-select>
                   <v-select
                    :items="driveExp"
                    v-model="selectExp"
                    label="Стаж водіння (у роках)"
                    single-line
                    :rules="reqRule"
                    required
                  ></v-select>
                  <v-select
                    :items="driveExp"
                    v-model="selectExp2"
                    label="Стаж водіння без аварій (у роках)"
                    single-line
                    :rules="reqRule"
                    required
                  ></v-select>
                            
                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn 
                      class="success" 
                      @click.native="sendOrder"
                      :disabled="!valid2"
                      >
                      Send
                      </v-btn>
                  </v-card-actions>
                </v-form>
              </v-card>
              
            </v-dialog>

         
          </v-card>
      </v-flex>

      <v-flex md8 >
        <v-card>
          <v-list two-line class="pt-0">
            <template>

             <div class="status-message" :class="carById.status ? 'success' : 'error'">
                  Статус - {{ carById.status  ? 'вільна' : 'зайнята' }}
              </div> 
             
              <v-list-tile
               v-for="value in paramsToShow"
               :key="value"
              >
                <v-list-tile-content>
                  <v-list-tile-title >{{ value }}</v-list-tile-title>
                  <v-list-tile-sub-title>{{ carById[value] }}</v-list-tile-sub-title>
                </v-list-tile-content>
              </v-list-tile>
            </template>
          </v-list>
        </v-card>
        
      </v-flex>


    </v-layout>
  </v-container>
</template>

<script>
export default {
  data () {
    return {
      datePickerFrom: null,
      datePickerTo: null,
      selectPicker: null,
      selectDrive: null,
      selectExp: null,
      selectExp2: null,
      errorMsg: false,
      valid: false,
      valid2: false,
      reqRule: [v => !!v || 'This field is required'],
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
      ],
      dialog: false,
      name: '',
      email: '',
      selectItems: [
        {
          text: 'Оренда для розваг',
          value: 'entertainment'
        },
        {
          text: 'Оренда для подорожі',
          value: 'travel'
        },
        {
          text: 'Оренда для роботи',
          value: 'work'
        },
        {
          text: 'Інше',
          value: 'other   '
        }
      ],
      driveCats: [
        {
          text: 'A'
        },
        {
          text: 'B'
        },
        {
          text: 'C'
        },
        {
          text: 'D'
        },
        {
          text: 'Інші - A1, B1, D1 і тд'
        }
      ],
      driveExp: [
        {
          text: '<1'
        },
        {
          text: '2'
        },
        {
          text: '3'
        },
        {
          text: '4'
        },
        {
          text: '>5'
        }
      ]
    }
  },
  computed: {
    cars() {
      return this.$store.getters.cars
    },
    carById(){
      const id = this.id
      return this.cars.find(elem => elem.id === id)
    },
    paramsToShow(){
      return this.$store.getters.paramsToShow
    },
    minDate(){
        let today = new Date()
        let dd = today.getDate()
        let mm = today.getMonth()+1 //January is 0!
        let yyyy = today.getFullYear()

        if(dd<10) {
            dd = '0' + dd
        } 

        if(mm<10) {
            mm = '0' + mm
        } 

      
        today = yyyy + '-' + mm + '-' + dd  //format

        return today
    }
  },
  methods: {

    firstFormClick(){
      if ( this.$refs.form.validate() && this.datePickerFrom ) {
        this.errorMsg = false
        this.dialog = true
      }else{
        this.errorMsg = true
      }
    },

    sendOrder(){
      const order = {
        id: this.id,
        dateFrom: this.datePickerFrom,
        dateTo: this.datePickerTo,
        name: this.name,
        email: this.email,
        driveCat: this.selectDrive.text,
        driveExp: this.selectExp.text,
        driveExp2: this.selectExp2.text
      }
      console.log(JSON.stringify(order))
      this.dialog = false
    }
  },
  props: ['id']
}




</script>




<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  h1, h2 {
    font-weight: normal;
  }
  ul {
    list-style-type: none;
    padding: 0;
  }
  li {
    display: inline-block;
    margin: 0 10px;
  }
  a {
    color: #42b983;
  }
  
  .date-wrap{
    padding: 0 16px
  }

  .status-message{
    font-size: 24px;
    color: #fff;
    padding: 16px;
  }

  .select-wrap{
    padding: 16px;
    display: flex;
  }
  .date-title{
    font-size: 20px;
    margin: 10px 0;
  }
  
  .error-message{
    font-size: 13px;
    margin-top: 10px;
    color: #ff5252;
  }

.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to{
  opacity: 0;
}


</style>
