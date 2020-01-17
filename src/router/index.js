import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import  Auth  from 'firebase';

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
    },   
    meta: {
      requiresAuth: true,
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
  },
  {
    path: '/arskurs-1',
    name: 'course_one',
    component: function () {
      return import(/* webpackChunkName: "about" */ '../views/Courses/CourseOne.vue')
    }
  },
  {
    path: '/arskurs-2',
    name: 'course_two',
    component: function () {
      return import(/* webpackChunkName: "about" */ '../views/Courses/CourseTwo.vue')
    }
  },
  {
    path: '/arskurs-3',
    name: 'course_three',
    component: function () {
      return import(/* webpackChunkName: "about" */ '../views/Courses/CourseThree.vue')
    }
  }
]

const router = new VueRouter({
  mode: 'history', // Tar bort # från URL 
  routes
})

router.beforeEach((to, from, next) => {
  if (to.matched.some(route => route.meta.requiresAuth)) {
    if (Auth.currentUser) {
      next();
    } else {
      next({ path: '/logga-in' });
    }
  }
  next();
});

export default router
