<?php
namespace Zclott\Lottery\Models;
use Illuminate\Support\Facades\DB;

class LotteryActivity
{	
	/**
	* @obj table string 数据库表名，注意配置文件表前缀
	*/   
	protected $table = 'lott_activity';
	/**
	* 获取某个活动列表
	*/ 
    public function getList(){

    	return DB::table($this->table)->get();
    }
	/**
	* 获取单个活动
	* @param $id int 活动id
	*/ 
	public function getInfo($id){

    	return DB::table($this->table)->where('id','=',$id)->first();
    }
	/**
	* 增加单个活动
	* @param $id int 活动id
	* @param $data array 增加字段值
	*/ 
    public function add($data){

    	return DB::table($this->table)->insert($data);
    }
	/**
	* 修改单个活动
	* @param $id int 活动id
	* @param $data array 修改的内容
	*/ 
    public function edit($id,$data){

    	return DB::table($this->table)->where('id','=',$id)->update($data);
    }
	/**
	* 删除单个活动
	* @param $id int 活动id
	*/ 
    public function del($id){

    	return DB::table($this->table)->where('id','=',$id)->delete();
    }

}