import VueRouter from 'vue-router'
import routes from './routes'

window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Vue = require('vue');

// Vue Router -----------
Vue.use(VueRouter);
const router = new VueRouter({
    linkActiveClass: 'active',
    linkExactActiveClass: 'exact-active',
    routes,
});

// Base components -----------
Vue.component('app-header', require('./components/AppHeader').default);

const app = new Vue({
    el: '#app',
    router,
});

