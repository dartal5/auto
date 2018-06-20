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
          <keep-alive>
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
              
              </div>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn
                  :to="'/car/' + carById.id" 
                  :disabled="!carById.status" 
                  color="success"
                  @click.native.stop="onForm"
                >Замовити</v-btn>
              </v-card-actions>
            </v-form>
          </keep-alive>

            <v-dialog v-model="codeForm" max-width="375">
              
              <v-card>
                <div class="pa-4">
                  <h2>
                      Check your email and enter a code
                  </h2>

                  <v-layout row class="mt-2">
                    <v-form ref="codeForm">
                      <div>
                        <v-text-field
                            v-model="code"
                            :rules="reqRule"
                            label="Code"
                            required
                        ></v-text-field>
                        <v-btn class="ml-0 mt-3" @click="onCodeForm">
                            Send
                        </v-btn>   
                      </div>
                    </v-form>
                  </v-layout>
                   
                </div>
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
      code: '',
      errorMsg: false,
      valid: false,
      reqRule: [v => !!v || 'This field is required'],
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
      ]
    }
  },
  computed: {
    cars() {
      return this.$store.getters.cars
    },
    codeForm(){
      return this.$store.state.orders.isVisibleCodeForm
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

    onForm(){
      if ( this.$refs.form.validate() && this.datePickerFrom ) {
        const user = this.$store.state.user.user

        if(user){
            const order = {
              action: 'step',
              step: 'calc',
              id: this.id,
              dateFrom: this.datePickerFrom,
              dateTo: this.datePickerTo
            }
            this.$store.dispatch('sendOrderStep1', order)
        }else{
            this.$store.commit('clearMessage')
            this.$store.commit('setMessage', 'Please, sign in to make an order')
        }
        
      }else{
        this.$store.commit('clearMessage')
        this.$store.commit('setMessage', 'Start date and purpose are required')
      }
    },

    onCodeForm(){
      if( this.$refs.codeForm.validate() ){
        const query = {
          action : 'step',
          step: 'code',
          code: this.code
        }
        this.$store.dispatch('sendOrderStep3', query)
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
  .tac{
    text-align: center;
  }


</style>
