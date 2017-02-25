
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
Vue.component('CardUser', require('./components/backoffice/CardUser.vue'));
Vue.component('CardTruck', require('./components/backoffice/CardTruck.vue'));
Vue.component('ModalAddUser', require('./components/backoffice/ModalAddUser.vue'));
Vue.component('ModalReportUser', require('./components/backoffice/ModalReportUser.vue'));
Vue.component('ModalAddTruck', require('./components/backoffice/ModalAddTruck.vue'));
Vue.component('ModalEditUser', require('./components/backoffice/ModalEditUser.vue'));
Vue.component('ModalEditTruck', require('./components/backoffice/ModalEditTruck.vue'));
Vue.component('ModalDeleteUser', require('./components/backoffice/ModalDeleteUser.vue'));
Vue.component('ModalDeleteTruck', require('./components/backoffice/ModalDeleteTruck.vue'));

const app = new Vue({
    el: '#app'
});
