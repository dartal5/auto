import axios from 'axios'
import qs from 'qs'

const api = 'http://localhost/auto/app/public/index.php'

export default {
    state: {

    },

    mutations: {

    },
    actions: {     
        registerUser({commit}, payload) {
            const user = qs.stringify(payload)
            axios.post(api, user)
                .then(response => {
                    console.log(response)
                })
                .catch(error => {
                    console.log(error)
                })
        },

        loginUser({commit}, payload) {
            const user = qs.stringify(payload)
            axios.post(api, user)
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