import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'
import BootstrapVue from 'bootstrap-vue'
import '~/plugins'
import '~/components'
import 'select2/dist/css/select2.min.css'
import 'select2/dist/js/select2.full.min'

Vue.config.productionTip = false
Vue.use(BootstrapVue)
Vue.prototype.$apiUrl = '/api/v1/'
axios.defaults.baseURL = Vue.prototype.$apiUrl;
Vue.prototype.$swal = {
  success: function (message) {
    swal(
      'Success!',
      message,
      'success')
  },
  error: function () {
    swal(
      'Whoops!',
      'Something went wrong please try again..',
      'error'
    )
  }
}
/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
})
