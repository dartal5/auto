import Vue from 'vue'
import Vuex from 'vuex'
import cars from './cars'
import userInfo from './userInfo'
import user from './user'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        cars,
        userInfo,
        user
    }
})