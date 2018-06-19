import axios from 'axios'
import qs from 'qs'
import router from '../router'

const api = 'http://localhost/auto/app/public/index.php'

export default {
    state: {
        user: null,
    },

    mutations: {
        setUser(state, payload){
            state.user = payload
        }
    },
    actions: {     

        registerUser({commit}, payload) {
            const user = qs.stringify(payload)
            axios.post(api, user)
                .then(response => {
                    commit('clearMessage')

                    const msg    = response.data.messages[0]
                    const status = response.data.status
                    

                    if(status){
                        const userId = response.data.id
                        commit('setUser', userId)
                    }
                    
                    commit('setMessage', msg)
                })
                .catch(error => {
                    console.log(error)
                })
        },

        loginUser({commit}, payload) {
            const user = qs.stringify(payload)
            axios.post(api, user)
                .then(response => {
                    commit('clearMessage')

                    const msg    = response.data.messages[0]
                    const status = response.data.status
                    

                    if(status){
                        const userId = response.data.id
                        commit('setUser', userId)
                        router.push('/')
                    }
                    
                    commit('setMessage', msg)
                    

                })
                .catch(error => {
                    console.log(error)
                })
        },

        autoLogin({commit}){
            axios.post(api, "action=getId")
                .then(response => {
                    console.log(response)
                })
                .catch(error => {
                    console.log(error)
                })
        }
    },

    getters: {
        
    }

}