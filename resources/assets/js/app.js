
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

// Vue.component('User', require('./components/backoffice/User.vue'));
Vue.component('Tabs', require('./components/backoffice/Tabs.vue'));
Vue.component('Tab', require('./components/backoffice/Tab.vue'));
Vue.component('Card', require('./components/backoffice/Card.vue'));

const app = new Vue({
    el: '#app'
});
