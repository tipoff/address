import Vue from 'vue';
import moment from 'moment';

Vue.filter('dollars', function (value) {
    if (!value) {
        return '';
    }

    const dollars = value / 100;

    return dollars.toLocaleString('en-US', {
        style: 'currency',
        currency: 'USD',
    });
});

Vue.filter('timeOfDay', function (value) {
    if (!value) {
        return '';
    }

    return moment(value).format('hh:mm A');
});

Vue.filter('fullDate', function (value) {
    if (!value) {
        return '';
    }

    return moment(value).format('dddd, MMMM Do YYYY');
});
