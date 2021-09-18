require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('user-search', require('./components/UserSearch.vue').default);
Vue.component('user-results', require('./components/UserResults.vue').default);

new Vue({
    el: '#app',
});
