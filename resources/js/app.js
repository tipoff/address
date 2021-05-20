require('./bootstrap');

window.Vue = require('vue');

import moment from 'moment';

Vue.prototype.moment = moment;

const app = new Vue({
    el: '#app',
});
