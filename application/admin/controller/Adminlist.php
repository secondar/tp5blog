<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use lib\checklib;
use think\Config;
use think\Session;
class Adminlist extends Controller
{
    public function index(){
    	checklib::isadminlog();
		checklib::isadminlog();
        $arr_Fetch['userinfo']=Session::get('userinfo');
        $arr_Fetch['GWeb']=Config::get('GWeb');
        if(empty($_GET['limit'])||$_GET['limit']<0){
            $_GET['limit']=1;
        }
        $int_Limitr=$_GET['limit']*50;
        if($_GET['limit']==1){
            $int_Limitl=0;
        }else{
            $int_Limitl=($_GET['limit']-1)*50;
        }
        $arr_Fetch['userlist']=Db::name('user')
            ->where('identity','1')
            ->limit("'".$int_Limitl.",".$int_Limitr."'")
            ->select();
        foreach ($arr_Fetch['userlist'] as $key => $value) {
            unset($arr_Fetch['userlist'][$key]['password']);
        }
        $this->assign('result', $arr_Fetch);
		return $this->fetch('index/adminlist');
    }
}
