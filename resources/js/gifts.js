require('./bootstrap');

window.Vue = require('vue');

import moment from 'moment';

Vue.prototype.moment = moment;

// Vue.component('gift-card-purchase', require('./components/gifts/GiftCardPurchase').default);

const app = new Vue({
    el: '#app',
});
