<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Lottery;

class LotteryController extends Controller
{
	/**
     * Lottery  index. 抽奖方法
	 * @param $uid int 用户id
	 * @param $activityId int 活动id
	 * @param $lotteryLimit int 抽奖次数
    */
    public function index(Request $request)
    {
    	$activityId = $request->get('activityId',1);
    	$uid = $request->get('uid',1);
    	$lotteryLimit = $request->get('lotteryLimit',3);;
		$result = Lottery::lottery($activityId,$uid,$lotteryLimit);
		if($result['result']){
			return response()->json(['code'=>0,'data'=>$result['result']]);
		}else{
			return response()->json(['code'=>0,'message'=>$result['message']]);
		}
		
    }
	/**
     * Lottery  activityInfo. 活动详情
	 * @param $activityId int 活动id
    */
	public function activityInfo(Request $request)
	{
		$activityId = $request->get('activityId');
		$activityObj =  Lottery::activityInfo($activityId);
		if($activityObj){
			return response()->json(['code'=>0,'data'=>$activityObj]);
		}else{
			return response()->json(['code'=>0,'message'=>'无数据']);
		}
		
	}
	/**
     * Lottery  prizeList. 奖品列表
	 * @param $activityId int 活动id
    */
	public function prizeList(Request $request)
	{
		$activityId = $request->get('activityId');
		$prizeObj =  Lottery::prizeList($activityId);
		if($prizeObj){
			return response()->json(['code'=>0,'data'=>$prizeObj]);
		}else{
			return response()->json(['code'=>0,'message'=>'无数据']);
		}
		
	}
	/**
     * Lottery  getPrizeRecord. 获奖记录
	 * @param $activityId int 活动id
	 * @param $page int 页码
	 * @param $limit int 条数
    */
	public function getPrizeRecord(Request $request)
	{
		$activityId = $request->get('activityId');
		$limit = $request->get('limit');
		$page = $request->get('page');
		$getPrizeObj = Lottery::getPrizeRecord($activityId,$page,$limit);
		if( $getPrizeObj){
			return response()->json(['code'=>0,'data'=>$getPrizeObj]);
		}else{
			return response()->json(['code'=>0,'message'=>'无数据']);
		}
	
	}
	/* Lottery  show. html展示
	 * https://100px.net/ 抽奖前端开源项目vue-luck-draw插件
    */
	public function show()
	{
		
		//js版本大转盘
		//return view('vendor.lottery.lottery1');
		//vue版本 vue-luck-draw插件 通过 import 引入
		//return view('vendor.lottery.lottery2');
		//vue版本 vue-luck-draw插件 通过script 标签引入
		return view('vendor.lottery.lottery1');
		
	}
}
