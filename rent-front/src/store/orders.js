import axios from 'axios'
import qs from 'qs'
import router from '../router'

const api = 'http://localhost/auto/app/public/index.php'

export default {
    state: {
        currentOrderPrice: null,
        isVisibleCodeForm: false
    },
    mutations: {
        fadeInCodeForm(state){
            state.isVisibleCodeForm = true
        },
        fadeOutCodeForm(state){
            state.isVisibleCodeForm = false
        }
    },
    actions: {
        sendOrderStep1({commit, dispatch}, payload){
            const order = qs.stringify(payload)
            axios.post(api, order)
                .then(response => {
                    commit('clearMessage')
                    console.log(response)
                    const price = response.data.price
                    if(price){
                        commit('setMessage', 'Final price of order - ' + price)
                        dispatch('sendOrderStep2')
                    }else{
                        commit('setMessage', 'Something goes wrong, try again later')
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        },

        sendOrderStep2({commit, dispatch}){
            axios.post(api, "action=step&step=form")
                .then(response => {
                    commit('fadeInCodeForm')
                })
                .catch(error => {
                    console.log(error)
                })
        },

        sendOrderStep3({commit, dispatch}, payload){
            const query = qs.stringify(payload)
            axios.post(api, query)
                .then(response => {
                    commit('clearMessage')
                    if(response.data){
                        commit('setMessage', 'Code was confirmed')
                        dispatch('sendOrderStep4')
                    }else{
                        commit('setMessage', 'Code was incorrect')
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        },

        sendOrderStep4({commit}){
            axios.post(api, "action=step&step=paym")
                .then(response => {
                    console.log(response)
                })
                .catch(error => {
                    console.log(error)
                })

            axios.post(api, "action=step&step=comp&complete=1")
                .then(response => {
                    commit('clearMessage')
                    if(response.data){
                        commit('setMessage', 'Thanks! Your order is accepted')
                        commit('fadeOutCodeForm')
                    }else{
                        commit('setMessage', 'Oops! Something goes wrong, try again later :(')
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        }
    },

   
}