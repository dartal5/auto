import axios from 'axios'

export default {
    state: {
        cars: [],
          paramsToShow: [
            'make', 'model', 'class_type', 'tran_type', 'type', 'fuel_type', 'price'
          ]
    },
    mutations: {
        setAllCars(state, payload) {
            state.cars.push(payload)
        }
    },
    actions: {
       getCars({commit}) {
            axios.get('http://localhost/auto/app/public/index.php?action=getAllCars')
                 .then(response => {
                     const cars = response.data
                     for(let car in cars){
                        commit('setAllCars', cars[car])
                     }
                 })
                 .catch(error => {
                     console.log(error)
                 })
       }
    },
    getters: {
        cars (state) {
            return state.cars
        },
        paramsToShow(state){
            return state.paramsToShow
        },
        carParams (state) {
            const carParams = {}
            state.paramsToShow.forEach(element => {
                carParams[element] = []
            })
            state.cars.forEach(element => {
              for( let prop in element ){
                if( (prop in carParams) && (carParams[prop].indexOf(prop) === -1 ) ){
                  carParams[prop].push(element[prop])
                }
            }
            })
            return carParams
          }
    }
}