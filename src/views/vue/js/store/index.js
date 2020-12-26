import Vue from 'vue';
import Vuex from 'vuex';
import lottery from './lottery';
Vue.use(Vuex);
export default new Vuex.Store({
  // 可以设置多个模块
  modules: {
    lottery
  }
});
