import axios from 'axios'
import qs from 'qs'
import router from '../router'

const api = 'http://localhost/auto/app/public/index.php'

export default {
    state: {
        currentOrderPrice: null
    },
    actions: {
        sendOrderStep1({commit, dispatch}, payload){
            const order = qs.stringify(payload)
            axios.post(api, order)
                .then(response => {
                    commit('clearMessage')
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
                    console.log(response)
                })
                .catch(error => {
                    console.log(error)
                })
        }
    },

   
}