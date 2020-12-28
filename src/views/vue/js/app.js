
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

window.Vue = require('vue');

//import App from './app.vue'
import VueRouter from 'vue-router';
import iView from 'iview';
import 'iview/dist/styles/iview.css';
import LuckDraw from 'vue-luck-draw'

// 导入vue
Vue.use(iView);
Vue.use(VueRouter);
Vue.use(LuckDraw);
// 路由配置
const RouterConfig = {
    routes: [
        // ExampleComponent laravel默认的示例组件
        //{ path: '/', component: require('./components/ExampleComponent.vue') },
        { path: '/:activityId', component: require('./components/LuckDraw.vue') },
    ],
    
};
const router = new VueRouter(RouterConfig);

const app = new Vue({
    el: '#app',
    router: router,
    //render: h => h(App)
});