import axios from 'axios'
export default {
  // 奖品记录
  getPrizeList: function (activityId) {
    return axios.get('/lottery/getPrizeRecord/?'+activityId)
  },
  // 奖品列表接口
  prizeList: function (activityId) {
    return axios.get('/lottery/prizeList/?' + activityId)
  },
  // 活动详情接口
  activityInfo: function (activityId) {
    return axios.get('/lottery/activityInfo/?' + activityId);
  },
  // 抽奖动作接口
  lottery: function (activityId) {
    return axios.get('/lottery/index/?' + activityId)
  }
}
