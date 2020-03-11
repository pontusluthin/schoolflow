/* -- Vue -- */
import Vue from 'vue'
import App from './App.vue'
import router from './router'
import VueAxios from 'vue-axios'
import axios from 'axios'

/* -- Components -- */
import Footer from './components/Footer'
import Header from './components/Header'
Vue.component('Header', Header)
Vue.component('Footer', Footer)

/* -- External -- */

/* Font Awesome */
import { library } from '@fortawesome/fontawesome-svg-core'
import { faSpinner } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { dom } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
dom.watch()
library.add(fas)
library.add(faSpinner)
Vue.component('font-awesome-icon', FontAwesomeIcon)

/* End Font Awesome */

Vue.use(VueAxios, axios)

// Render components 
new Vue({
  router, 
  render: function (h) { return h(App) }
}).$mount('#app')
