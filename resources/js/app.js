require('./bootstrap');

window.Vue = require('vue');
require('./filter');
require('./progressbar');

import Gate from "./Gate";
Vue.prototype.$gate = new Gate(window.user);
import Meta from 'vue-meta';
Vue.use(Meta);

/* Bootstrap */
import BootstrapVue from 'bootstrap-vue/dist/bootstrap-vue.esm';

// Import the styles directly. (Or you could add them via script tags.)
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

Vue.use(BootstrapVue);

// Importing Sweet Alert 2
import swal from 'sweetalert2'

window.swal = swal;

// Initialize toaster
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

// Adding the Toaster globally
window.toast = toast;

//Import v-from
import {Form, HasError, AlertError} from 'vform';

window.Form = Form;
// Adding vForm globally
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import VueRouter from 'vue-router'

Vue.use(VueRouter)

//Routes
import {routes} from './routes';

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'hash',
});

Vue.component('pagination', require('laravel-vue-pagination'));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('home-component', require('./components/HomeComponent.vue').default);
Vue.component('header-component', require('./components/common/HeaderComponent.vue').default);
Vue.component('send-header-component', require('./components/common/sendHeader.vue').default);
Vue.component('footer-component', require('./components/common/FooterComponent.vue').default);
Vue.component('recipient-form', require('./components/recipientFormComponent.vue').default);
Vue.component('send-money-tab', require('./components/common/sendMoneyTab.vue').default);

Vue.component('social-login', require('./components/socialLogin.vue').default);
// Custom events
window.Fire = new Vue();

const FILESYSTEM_DRIVER = 'public';
// const FILESYSTEM_DRIVER = 's3';

if (FILESYSTEM_DRIVER == 's3') {
    Vue.prototype.$ImageUrl = "https://ecommerce-technomads.s3.ap-south-1.amazonaws.com/";
} else {
    Vue.prototype.$ImageUrl = "public/storage/";
}


/* TransferWise */
const TRANSFERWISE = 'sandbox';
// const  TRANSFERWISE = 'live';

if (FILESYSTEM_DRIVER == 'live') {
    Vue.prototype.$TransferWiseUrl = "https://api.transferwise.com/";
    Vue.prototype.$TRANSFERWISE_API_TOKEN = "da9a51fc-e110-4840-8b34-a8fc7c378326";
} else {
    Vue.prototype.$TransferWiseUrl = "https://api.sandbox.transferwise.tech/v1/";
    Vue.prototype.$TRANSFERWISE_API_TOKEN = "da9a51fc-e110-4840-8b34-a8fc7c378326";
}

Vue.prototype.accessToken = '';
Vue.prototype.userInfo = '';

Vue.prototype.headerArr = ['','home',];
Vue.prototype.secondHeaderArr = ['send','enterpayment','senderdetail','recipient','verification','review'];
Vue.prototype.emptyFooterArr = [
    'login','register','forgot-password','reset-password','verify-otp','enterpayment','senderdetail','recipient',
    'verification','review'
];

new Vue({
    el: '#app',
    router
});
