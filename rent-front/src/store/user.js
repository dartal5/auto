import axios from 'axios'
import qs from 'qs'
import router from '../router'

const api = 'http://localhost/auto/app/public/index.php'

export default {
    state: {
        user: null,
        userInfo: {}
    },

    mutations: {
        setUser(state, payload){
            state.user = payload
        },
        setUserInfo(state, payload){
            state.userInfo = payload
        },
        logout(state){
            state.user = null
        }
    },
    actions: {     
        registerUser({commit, dispatch}, payload) {
            const user = qs.stringify(payload)
            axios.post(api, user)
                .then(response => {
                    commit('clearMessage')

                    const msg    = response.data.messages[0]
                    const status = response.data.status

                    if(status){
                        const userId = response.data.id
                        commit('setUser', userId)
                        dispatch('getUserCars')
                        dispatch('getClient')

                    }
                    commit('setMessage', msg)
                })
                .catch(error => {
                    console.log(error)
                })
        },

        loginUser({commit, dispatch}, payload) {
            const user = qs.stringify(payload)
            axios.post(api, user)
                .then(response => {
                    commit('clearMessage')
                    const msg    = response.data.messages[0]
                    const status = response.data.status
                    
                    if(status){
                        const userId = response.data.id
                        commit('setUser', userId)
                        dispatch('getUserCars')
                        dispatch('getClient')
                        router.push('/')
                    }
                    commit('setMessage', msg)
                })
                .catch(error => {
                    console.log(error)
                })
        },

        autoLogin({commit, dispatch}){
            axios.post(api, 'action=getId')
                .then(response => {
                    if(response.data !== -1){
                        commit('setUser', response.data)
                        dispatch('getUserCars')
                        dispatch('getClient')
                    }
                })
                .catch(error => {
                    console.log(error) 
                })
        },

        logout({commit}){
            axios.post(api, 'action=logout')
                .then(response => {
                    const msg = response.data.messages[0]
                    commit('clearMessage')
                    commit('setMessage', msg)
                    commit('logout')
                    router.push('/')
                })
                .catch(error => {
                    console.log(error)
                })
        },

        getClient({commit}){
            axios.get(api + '?action=getClient')
                .then(response => {
                    if(response.data){
                        const userInfo = response.data
                        commit('setUserInfo', userInfo)
                    }
                   
                })
                .catch(error => {
                    console.log(error)
                })
        },

        updatePass({commit}, payload){
            const password = qs.stringify(payload)
            axios.post(api, password)
                .then(response => {
                    const msg = response.data.messages[0]
                    commit('clearMessage')
                    commit('setMessage', msg)
                })
                .catch(error => {
                    console.log(error)
                })
        },

        updateUser({commit}, payload){
            const userInfo = qs.stringify(payload)
            axios.post(api, userInfo)
                .then(response => {
                    const msg = response.data.messages[0]
                    commit('clearMessage')
                    commit('setMessage', msg)
                })
                .catch(error => {
                    console.log(error)
                })
        }
    },

    getters: {
        
    }

}