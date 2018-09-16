// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VeeValidate from 'vee-validate';
// import VueToastr from '@deveodk/vue-toastr'
// import '@deveodk/vue-toastr/dist/@deveodk/vue-toastr.css'

import VueIziToast from 'vue-izitoast';
import 'izitoast/dist/css/iziToast.css';

//Bootstrap
import BootstrapVue from 'bootstrap-vue';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

Vue.config.productionTip = false;

Vue.use(BootstrapVue);
Vue.use(VueAxios, axios);
Vue.use(VeeValidate);
// Vue.use(VueToastr, {
//     defaultPosition: 'toast-top-right',
//     defaultType: 'error',
//     defaultTimeout: 5000
// });
Vue.use(VueIziToast);

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>',
})
