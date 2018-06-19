<template>
  <v-app>
    <v-navigation-drawer
      
      v-model="drawer"
      app
    >
      <v-list class="mt-2">

        <v-list-tile>
          <v-switch
            :label="'Вільна зараз'"
            v-model="paramsModel.status"
            color="red"
          ></v-switch>
        </v-list-tile>

        <v-list-tile
          class="mt-2"
          v-for="(car, name) in carParams"
          v-if="name != 'price'"
          :key="name"
        >
          <v-select
           
            :items="car"
            v-model="paramsModel[name]"
            :label="name"
          ></v-select>
        </v-list-tile>

        
        <v-list-tile>
          <v-btn
            class="error"
            @click="resetFilter"
          >
            Очистити
          </v-btn>
          <v-btn 
            class="info"
            @click="filterCars"
          >
            Фільтр
          </v-btn>
        </v-list-tile>
        




      </v-list>
    </v-navigation-drawer>
    <v-toolbar
      app
      class="primary"
      dark
    >
      <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title v-text="title"></v-toolbar-title>
      
      <v-spacer></v-spacer>
      <v-toolbar-items 
        class="hidden-sm-and-down"
        v-for="link in links"
        :key="link.title"
      >
        <v-btn flat :to="link.src">
          <v-icon left>{{ link.icon }}</v-icon>
          {{ link.title }}
        </v-btn>
      </v-toolbar-items>
    </v-toolbar>
    <v-content>
      <router-view/>
    </v-content>

    <v-snackbar
      :timeout="5000"
      :bottom="true"
      :multi-line="'multi-line'"
      :vertical="'vertical'"
      v-model="isVisibleMsg"
    >
      {{ message }}
      <v-btn flat color="pink" @click.native="clearMessage">Close</v-btn>
    </v-snackbar>

    <v-footer app>
      <span>&copy; 2017</span>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  data () {
    return {
      drawer: true,
      title: 'Car rent app',
      paramsModel: {
        status: null,
        make: null,
        class_type: null,
        train_type: null,
        type: null,
        fuel_type: null
      }
    }
  },
  computed: {
    links() {
      if( this.$store.state.user.user ){
        return [
          {
            icon: 'home',
            title: 'Home',
            src: '/'
          },
          {
            icon: 'business_center',
            title: 'My orders',
            src: '/orders'
          },
          {
            icon: 'settings',
            title: 'settings',
            src: '/settings'
          },
          {
            icon: 'account_box',
            title: 'Logout',
            src: '/Logout'
          }
          ]
        } else {
          return [
            {
              icon: 'home',
              title: 'Home',
              src: '/'
            },
            {
              icon: 'account_box',
              title: 'Register',
              src: '/register'
            },
            {
              icon: 'account_box',
              title: 'Login',
              src: '/Login'
            }
          ]
        }
    },
    cars (){
      return this.$store.getters.cars
    },
    carParams (){
      return this.$store.getters.carParams
    },
    message() {
      return this.$store.state.messages.message
    },
    isVisibleMsg: {
      set(val){
        this.$store.commit('clearMessage')
      },
      get() {
        return this.$store.state.messages.isVisibleMsg
      }
      
    }
      
  },
  methods: {
    filterCars(){
      this.$router.push({ name: 'Home', query: this.paramsModel })
    },
    resetFilter(){
      for( let prop in this.paramsModel ){
        this.paramsModel[prop] = null
      }
      this.$router.push('/')
    },
    clearMessage(){
      this.$store.commit('clearMessage')
    }
  },
  name: 'App'
}
</script>
