import axios from 'axios'
import qs from 'qs'
import router from '../router'

const api = 'http://localhost/auto/app/public/index.php'

export default {
    actions: {
        sendOrderStep1({commit}, payload){
            const order = qs.stringify(payload)
            axios.post(api, order)
                .then(response => {
                    console.log(response)
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}