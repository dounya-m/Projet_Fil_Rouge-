import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './index.css'
import './assets/style/main.css'
import './assets/style/login.css'
// import JsonExcel from "vue-json-excel";

import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'


/* add icons to the library */
library.add(faUserSecret)


// new Vue({
//   el: '#app',
//   components: { App },
//   template: '<App/>'
// })
createApp(App)
.component('font', FontAwesomeIcon)
.use(router)
.mount('#app')
