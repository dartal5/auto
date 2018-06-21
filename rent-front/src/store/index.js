import Vue from 'vue'
import Vuex from 'vuex'
import cars from './cars'
import userInfo from './userInfo'
import user from './user'
import messages from './messages'
import orders from './orders'


Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        cars,
        userInfo,
        user,
        messages,
        orders
    }
})