/* MENU ROUTES */

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
    path: '/priser',
    name: 'products',
    component: function () {
      return import( '../views/Products.vue' )
    }
  },
  {
    path: '/om-oss',
    name: 'about',
    component: function () {
      return import( '../views/About.vue' )
    }
  },
  {
    path: '/kontakt',
    name: 'contact',
    component: function () {
      return import( '../views/Contact.vue' )
    }
  },
  {
    path: '/betalning',
    name: 'payment',
    component: function () {
      return import( '../views/Checkout.vue' )
    }
  },
  {
    path: '/svenska',
    name: 'swedish',
    component: function () {
      return import( '../views/Subjects/Swedish.vue' )
    }
  },
  {
    path: '/matte',
    name: 'math',
    component: function () {
      return import( '../views/Subjects/Math.vue' )
    }
  },
  {
    path: '/engelska',
    name: 'english',
    component: function () {
      return import( '../views/Subjects/English.vue' )
    }
  },
  {
    path: '/arskurs-1',
    name: 'course_one',
    component: function () {
      return import( '../views/Courses/CourseOne.vue' )
    }
  },
  {
    path: '/arskurs-2',
    name: 'course_two',
    component: function () {
      return import( '../views/Courses/CourseTwo.vue' )
    }
  },
  {
    path: '/arskurs-3',
    name: 'course_three',
    component: function () {
      return import( '../views/Courses/CourseThree.vue' )
    }
  },
  {
    path: '/inloggad',
    name: 'customer_login',
    component: function () {
      return import( '../views/CustomerDashboard.vue' )
    }
  },
  {
    path: '/logga-in',
    name: 'login',
    component: function () {
      return import( '../views/Login.vue' )
    }
  }
]

// Remove # from URL 
const router = new VueRouter({
  mode: 'history', 
  routes
})

// Login function
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

/* MENU ROUTES END */