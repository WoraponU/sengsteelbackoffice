
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
Vue.component('Index', require('./components/frontoffice/Index.vue'));
Vue.component('NavBar', require('./components/frontoffice/NavBar.vue'));
Vue.component('Tabs', require('./components/frontoffice/Tabs.vue'));
Vue.component('Tab', require('./components/frontoffice/Tab.vue'));
Vue.component('DataNotFound', require('./components/frontoffice/DataNotFound.vue'));
Vue.component('CardFuel', require('./components/frontoffice/CardFuel.vue'));
Vue.component('CardTire', require('./components/frontoffice/CardTire.vue'));
Vue.component('CardMaintain', require('./components/frontoffice/CardMaintain.vue'));
Vue.component('DashboardTab', require('./components/frontoffice/DashboardTab.vue'));
Vue.component('FuelTab', require('./components/frontoffice/FuelTab.vue'));
Vue.component('TireTab', require('./components/frontoffice/TireTab.vue'));
Vue.component('MaintainTab', require('./components/frontoffice/MaintainTab.vue'));
Vue.component('TruckAndDriverMap', require('./components/frontoffice/TruckAndDriverMap.vue'));
Vue.component('ModalReportFuel', require('./components/frontoffice/ModalReportFuel.vue'));
Vue.component('ModalReportTire', require('./components/frontoffice/ModalReportTire.vue'));
Vue.component('ModalReportMaintain', require('./components/frontoffice/ModalReportMaintain.vue'));
Vue.component('ModalEditFuel', require('./components/frontoffice/ModalEditFuel.vue'));
Vue.component('ModalEditTire', require('./components/frontoffice/ModalEditTire.vue'));
Vue.component('ModalEditMaintain', require('./components/frontoffice/ModalEditMaintain.vue'));
Vue.component('ModalDeleteFuel', require('./components/frontoffice/ModalDeleteFuel.vue'));
Vue.component('ModalDeleteTire', require('./components/frontoffice/ModalDeleteTire.vue'));

const app = new Vue({
    el: '#app'
});
