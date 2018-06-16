import axios from 'axios'

export default {
    state: {
        cars: [
            {
              id: '1', 
              make: 'BMW',
              model: 'X6',
              info: 'Тачка кууул',
              status: 1,
              picture: 'https://www.rubmw.ru/pictures/photoalbum/39261/large.jpg',
              class_type: 'business',
              train_type: 'auto',
              type: 'sedan',
              seats: 4,
              fuel_type: 'petrol',
              base_coeff: 400,
              class_coeff: 2,
              transmission_coeff: 1.6,
              type_coeff: 1.7,
              price: 2176 
            },
            {
                id: '2', 
                make: 'Lada',
                model: 'Sedan',
                info: 'Nu Takoe',
                status: 1,
                picture: 'https://www.rubmw.ru/pictures/photoalbum/39261/large.jpg',
                class_type: 'business',
                train_type: 'auto',
                type: 'sedan',
                seats: 4,
                fuel_type: 'diesel',
                base_coeff: 300,
                class_coeff: 2,
                transmission_coeff: 1.6,
                type_coeff: 1.7,
                price: 4176 
            },
            {
                id: '3', 
                make: 'Nissan',
                model: 'Turbo',
                info: 'This is very good car, buy it',
                status: 1,
                picture: 'https://www.rubmw.ru/pictures/photoalbum/39261/large.jpg',
                class_type: 'sport',
                train_type: 'auto',
                type: 'sedan',
                seats: 5,
                fuel_type: 'petrol',
                base_coeff: 400,
                class_coeff: 2,
                transmission_coeff: 1.6,
                type_coeff: 1.7,
                price: 2176 
            },
          ],
          paramsToShow: [
            'make', 'model', 'class_type', 'train_type', 'type', 'fuel_type', 'price'
          ]
    },
    mutations: {

    },
    actions: {
       getCars({commit}) {
            axios.get('http://localhost/app/public/index.php?action=getAllCars')
                 .then(response => {
                     console.log(response)
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