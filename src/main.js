import Vue from 'vue'
import App from './App.vue'
import router from './router'
import Header from './components/Header'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faSpinner } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { dom } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'



Vue.config.productionTip = false

Vue.component('Header', Header)


dom.watch()
library.add(fas)


library.add(faSpinner)
Vue.component('font-awesome-icon', FontAwesomeIcon)

new Vue({
  router, 
  render: function (h) { return h(App) }
}).$mount('#app')
