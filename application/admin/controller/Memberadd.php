<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use lib\checklib;
use think\Config;
use think\Session;
class Memberadd extends Controller
{
    public function index(){
    	checklib::isadminlog();
		return $this->fetch('index/memberadd');
    }
    public function userban(){
    	checklib::isadminlog();
    	if($_POST['is']==='ban'){
    		$data['status']=1;
    	}else{
    		$data['status']=0;
    	}
		$_POST['uid']=intval($_POST['uid']);
        Db::name('user')->where('uid',$_POST['uid'])->update($data);
    }
    public function userupdate(){
    	checklib::isadminlog();
        $int_Uid=intval($_POST['info']['id']);
        $data['password']=checklib::handlepassword(trim($_POST['info']['pass']));
        Db::name('user')->where('uid',$int_Uid)->update($data);
    }
}
