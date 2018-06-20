import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Car from '@/components/Cars/Car'
import Register from '@/components/Auth/Register'
import Login from '@/components/Auth/Login'
import Settings from '@/components/Auth/Settings'

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
    },
    {
      path: '/register',
      name: 'Register',
      component: Register
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '/settings',
      name: 'Settings',
      component: Settings
    }
  ],
  mode: 'history'
})
