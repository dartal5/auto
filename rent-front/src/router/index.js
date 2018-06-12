import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Car from '@/components/Cars/Car'


Vue.use(Router)


export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/car/:id',
      name: 'Car',
      component: Car,
      props: true
    }
  ],
  mode: 'history'
})
