import api from '../api/api';
export default{
  state: {
    getPrizeLists: [], // 获奖记录列表
    prizeLists: [],  // 奖品列表
    Info: {}, // 活动详情
	lotteryRes: {}  // 中奖详情
  },
  mutations: {
    // 注意，这里可以设置 state 属性，但是不能异步调用，异步操作写到 actions 中
    GETPRIZELIST(state, lists) {
      state.getPrizeLists = lists;
    },
    SETLISTS(state, lists) {
      state.prizeLists= lists;
   
	},
    SETDETAIL(state, detail) {
      state.Info = detail;
    },
	
	LOTTEYRES(state, lotteryRes) {
      state.lotteryRes = lotteryRes;
    }
  },
  actions: {
    getPrizeList({commit}, activityId) {
        api.getPrizeList(activityId).then(function(res) {
        commit('GETPRIZELIST', res.data);
      });
    },
    activityInfo({commit}, activityId) {
      
		api.activityInfo(activityId).then(function(res) {
        commit('SETDETAIL', res.data);
      });
    },
    prizeList({commit}, activityId) {

		api.prizeList(activityId).then(function(res) {
		commit('SETLISTS', res.data);
      });
    },
	
	lotteryed({commit}, activityId) {
      api.lottery(activityId).then(function(res) {
        commit('LOTTEYRES', res.data);
      });
    }
  }
}
