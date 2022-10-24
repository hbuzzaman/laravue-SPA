require('./bootstrap');

import { createApp } from 'vue'
import App from './components/App.vue'

window.Vue = Vue;


import {router} from './routes'

import VueAxios from 'vue-axios'
import axios from 'axios'


const app = createApp(App)
  app.use(VueAxios, axios)
  app.use(router)
  app.mount('#App')