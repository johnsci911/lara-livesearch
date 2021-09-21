require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('user-search', require('./components/UserSearch.vue').default);
Vue.component('user-results', require('./components/UserResults.vue').default);
Vue.component('user-show', require('./components/UserShow.vue').default);
Vue.component('user-create-edit', require('./components/UserCreateEdit.vue').default);

new Vue({
    el: '#app',
});
