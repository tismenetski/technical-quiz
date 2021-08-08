import {createApp} from 'vue'
import ElementPlus from 'element-plus';
import 'element-plus/lib/theme-chalk/index.css';
import 'mdb-vue-ui-kit/css/mdb.min.css';

require('./bootstrap')
import App from './App.vue'
import axios from 'axios'
import router from './router'
import store from './store/index'

const app = createApp(App)
app.config.globalProperties.$axios = axios;
app.use(router)
app.use(ElementPlus)
app.use(store)
app.mount('#app')
