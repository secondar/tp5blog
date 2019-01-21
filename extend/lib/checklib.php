<?php 
namespace lib;
use think\Session;
/**
 * 
 */
class checklib
{
	/**
	 * [handlepassword description]
	 * //仅为了好玩-.-!!
	 * @param  [string] $password [description]
	 * @return [string]           [description]
	 */
	static function handlepassword($password)
	{
		//仅为了好玩-.-!!
		$password = preg_split('/(?<!^)(?!$)/u', $password);
	    foreach($password as &$v){
	        $temp = unpack('H*', $v);
	        $v = base_convert($temp[1], 16, 2);
	        unset($temp);
	    }
		$password=md5(md5(implode($password)));
		$password = preg_split('/(?<!^)(?!$)/u', $password);
		foreach($password as &$v){
	        $temp = unpack('H*', $v);
	        $v = base_convert($temp[1], 16, 2);
	        unset($temp);
	    }
		$password=md5(md5(implode($password)));
		return $password;
	}
	static function ipaddress($ip){
		$res = file_get_contents("http://ip.360.cn/IPQuery/ipquery?ip=$ip");
		$res = json_decode($res,true);
		if(empty($res['data'])){
			return '未知';
		}else{
			return $res['data'];
		}
	}
	static function isadminlog(){
		 if (!Session::has('userinfo')) {
	        $this->error('请先登录!','./user/index');
	    }else{
	    	if(Session::get('userinfo')['identity']){
	    		
	    	}else{
	    		$this->error('您无访问权限!','./index/index');
	    	}
	    }
	}
}