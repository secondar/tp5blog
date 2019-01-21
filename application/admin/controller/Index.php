<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use lib\checklib;
use think\Config;
class Index extends Controller
{
	//主页入口
    public function index(){
        //验证是否登录
	    if (!Session::has('userinfo')) {
	        $this->error('请先登录!','./user/index');
	    }else{
	    	if(Session::get('userinfo')['identity']){
	    		$arr_Fetch['userinfo']=Session::get('userinfo');
	    		$arr_Fetch['GWeb']=Config::get('GWeb');
	    		$this->assign('result', $arr_Fetch);
        		return $this->fetch();
	    	}else{
	    		$this->error('您访问权限!','./index/index');
	    	}
	    }
    }
    //修改用户名及密码
    public function userupdate(){
    	checklib::isadminlog();
        $int_Uid=intval($_POST['uid']);
        $data['name']=trim($_POST['name']);
        $arr_info = Db::name('user')
        	->where('name', trim($_POST['name']))
        	->where('password',checklib::handlepassword(trim($_POST['old_password'])))
        	->find();
        if(empty($arr_info)){
        	$this->error('用户名或密码错误!');
        }
        if(trim($_POST['password'])==trim($_POST['new_password'])){
        	$data['password']=checklib::handlepassword(trim($_POST['password']));
        	Db::name('user')->where('uid',$int_Uid)->update($data);
        	Session::clear();
        	$this->success('修改成功', './user/index');
        }else{
        	$this->error('新密码两次输入不一致!');
        } 
    }
    public function logout()
    {
    	Session::clear();
    	$this->success('退出成功', './user/index');
    }
    public function welcome()
    {
        $arr_Fetch['userinfo']=Session::get('userinfo');
        $arr_Fetch['GWeb']=Config::get('GWeb');
        $arr_Fetch['Webinfo']['countuser']=Db::name('user')
            ->field('count(uid) as countuser')
            ->select()[0]['countuser'];
        $arr_Fetch['Webinfo']['log']=Db::name('log')
            ->order('lastlog desc')
            ->limit('10')
            ->select();
        $this->assign('result', $arr_Fetch);
        return $this->fetch('index/welcome');
    }
}
