
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
Vue.component('Index', require('./components/backoffice/Index.vue'));
Vue.component('NavBar', require('./components/backoffice/NavBar.vue'));
Vue.component('Tabs', require('./components/backoffice/Tabs.vue'));
Vue.component('Tab', require('./components/backoffice/Tab.vue'));
Vue.component('Card', require('./components/backoffice/Card.vue'));
Vue.component('ModalAdd', require('./components/backoffice/ModalAdd.vue'));
Vue.component('ModalEdit', require('./components/backoffice/ModalEdit.vue'));
Vue.component('ModalDelete', require('./components/backoffice/ModalDelete.vue'));

const app = new Vue({
    el: '#app'
});
