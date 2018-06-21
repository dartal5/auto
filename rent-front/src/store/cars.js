import axios from 'axios'
const api = 'http://localhost/auto/app/public/index.php'

export default {
    state: {
        cars: [],
        userCars: [],
        paramsToShow: [
        'make', 'model', 'class_type', 'tran_type', 'type', 'fuel_type', 'price'
        ]
    },
    mutations: {
        setCars(state, payload) {
            state.cars.push(payload)
        },
        setUserCars(state, payload) {
            state.userCars.push(payload)
        }
    },
    actions: {
       getCars({commit}) {
            axios.get(api + '?action=getAllCars')
                 .then(response => {
                     const cars = response.data                  
                     for(let car in cars){
                        commit('setCars', cars[car])
                     }
                 })
                 .catch(error => {
                     console.log(error)
                 })
       },
       getUserCars({commit}){
            axios.get(api + '?action=getCarHistoryExtend')
                .then(response => {
                    const cars = response.data
                    for(let car in cars){
                        commit('setUserCars', cars[car])
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