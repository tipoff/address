require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import moment from 'moment';
// import store from './booking/store';
// import './booking/filters';

Vue.use(VueRouter);

Vue.prototype.moment = moment;
Vue.use(require('vue-moment'));
Vue.prototype.accessToken = process.env.MIX_TGER_ACCESS_TOKEN;
Vue.prototype.csrfToken = document.querySelector('meta[name="csrf-token"]').content;

// Vue.component('countdown-clock', require('./booking/components/CountdownClock').default);
// Vue.component('games-list', require('./booking/components/GamesList').default);
// Vue.component('purchase-form', require('./booking/components/PurchaseForm').default);
// Vue.component('deduction-code-form', require('./booking/components/DeductionCodeForm').default);

const router = new VueRouter({
    mode: 'history',
});

new Vue({
    el: '#app',
    store,
    router,
});
