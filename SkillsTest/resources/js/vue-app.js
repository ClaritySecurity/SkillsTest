import Vue from 'vue'

Vue.component('listings', require('./components/Listings.vue').default);

const app = new Vue({
    el: '#section-main',
});

window.app = app;
