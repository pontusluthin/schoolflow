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
  },
  {
    path: '/betalning',
    name: 'payment',
    component: function () {
      return import(/* webpackChunkName: "about" */ '../views/PaymentPage.vue')
    }
  },
  {
    path: '/logga-in',
    name: 'login',
    component: function () {
      return import(/* webpackChunkName: "about" */ '../views/Login.vue')
    }
  },
  {
    path: '/svenska',
    name: 'swedish',
    component: function () {
      return import(/* webpackChunkName: "about" */ '../views/Subjects/Swedish.vue')
    }
  },
  {
    path: '/matte',
    name: 'math',
    component: function () {
      return import(/* webpackChunkName: "about" */ '../views/Subjects/Math.vue')
    }
  },
  {
    path: '/engelska',
    name: 'english',
    component: function () {
      return import(/* webpackChunkName: "about" */ '../views/Subjects/English.vue')
    }
  }
]

const router = new VueRouter({
  mode: 'history', // Tar bort # från URL 
  routes
})

export default router
