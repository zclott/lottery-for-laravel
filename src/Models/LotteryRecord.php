<?php
namespace Zclott\Lottery\Models;
use Illuminate\Support\Facades\DB;

class LotteryRecord
{	
	/**
	* @obj table string 数据库表名，注意配置文件表前缀
	*/   
	protected $table = 'lott_record';
	/**
	* 获取某个活动所有获奖记录
	* @param $activityId int 活动id
	* @param $limit 分页限制
	*/ 
    public function getPrizeList($activityId,$page,$limit){
		/*state为1代表中奖 0代表未中奖*/
    	return DB::table($this->table)->where([['activityId','=',$activityId],['state','=',1]])->paginate($limit,['*'],'page',$page);
    }
	/**
	* 获取某个活动某个用户所有获奖记录
	* @param $activityId int 活动id
	* @param $uid 用户标识
	* @param $limit 分页限制
	*/ 
	public function userRecord($activityId,$uid,$page,$limit){

    	return DB::table($this->table)->where([['activityId','=',$activityId],['uid','=',$uid],['state','=',1]])->paginate($limit,['*'],'page',$page);
    }
	/**
	* 获取某个活动某个奖品的已抽中数量
	* @param $pid 奖品标识id
	*/ 
	public function prizeCount($pid){

    	return DB::table($this->table)->where('prizeId','=',$pid)->count();
    }
	/**
	* 增加用户抽奖记录（中与不中都记录）
	* @param $data array 增加字段值
	*/ 
    public function add($data){

    	return DB::table($this->table)->insert($data);
    }
	/**
	* 增加用户抽奖记录到记录表（中与不中都记录），并且将已中奖奖品数量在奖品表中+1
	* @param $data array 增加字段值
	* @param $lott_num int 奖品已中奖数量
	*/ 
    public function update($data,$lott_num){
		
		DB::beginTransaction();
		try{ 			  //中间逻辑代码
			DB::table($this->table)->insert($data);
			DB::table('lott_prize')->where('id','=',$data['prizeId'])->update(['lott_num'=>$lott_num]);
			DB::commit(); 
			return true;
		}catch (\Exception $e) { 
			DB::rollBack(); 
			return false;
		}
 
    }	

}