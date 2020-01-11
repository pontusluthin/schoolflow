import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/prenumerationer',
    name: 'prenumerationer',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: function () {
      return import(/* webpackChunkName: "about" */ '../views/Subscription.vue')
    }
  },
  {
    path: '/om-oss',
    name: 'about',
    component: function () {
      return import(/* webpackChunkName: "about" */ '../views/About.vue')
    }
  },
  {
    path: '/kontakt',
    name: 'contact',
    component: function () {
      return import(/* webpackChunkName: "about" */ '../views/Contact.vue')
    }
  }
]

const router = new VueRouter({
  mode: 'history', // Tar bort # från URL 
  routes
})

export default router
