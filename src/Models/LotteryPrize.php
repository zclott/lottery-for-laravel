<?php
namespace Zclott\Lottery\Models;
use Illuminate\Support\Facades\DB;

class LotteryPrize 
{	
	/**
	* @obj table string 数据库表名，注意配置文件表前缀
	*/   
	protected $table = 'lott_prize';
	/**
	* 获取某个活动奖品列表(对外展示的奖品字段)
	* @param $activityId int 活动id
	*/ 
    public function getList($activityId){

    	return DB::table($this->table)->select('id','name','imgUrl')->where('activityId','=',$activityId)->get();
    }
	/**
	* 获取某个活动奖品列表
	* @param $activityId int 活动id
	*/ 
    public function getAllList($activityId){

    	return DB::table($this->table)->where('activityId','=',$activityId)->get();
    }
	/**
	* 获取单个活动奖品
	* @param $id int 奖品id
	*/ 
	public function getInfo($id){

    	return DB::table($this->table)->where('id','=',$id)->first();
    }
	/**
	* 增加单个活动奖品
	* @param $data array 增加字段值
	*/ 
    public function add($data){

    	return DB::table($this->table)->insert($data);
    }
	/**
	* 修改单个活动奖品
	* @param $id int 奖品id
	* @param $data array 修改的内容
	*/ 
    public function edit($id,$data){

    	return DB::table($this->table)->where('id','=',$id)->update($data);
    }
	/**
	* 删除单个活动奖品
	* @param $id int 奖品id
	*/ 
    public function del($id){

    	return DB::table($this->table)->where('id','=',$id)->delete();
    }

}