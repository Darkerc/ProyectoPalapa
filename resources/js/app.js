/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
window.Vue = require('vue');

// const App = require("./Application.vue").default;
import App from './Application.vue'
import 'es6-promise/auto'
import axios from 'axios'
import vuetify from './Vuetify.js'
import router from "./VueRouter.js"
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import auth from './auth'
import Toasted from 'vue-toasted';

Vue.router = router
Vue.use(VueAxios, axios)
Vue.use(VueAuth, auth)
Vue.use(Toasted)

const VueApp = new Vue({
    render: h => h(App),
    components: { App },
    vuetify,
    router
}).$mount('#app');
