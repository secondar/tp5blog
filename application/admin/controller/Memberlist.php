<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use lib\checklib;
use think\Config;
use think\Session;
class Memberlist extends Controller
{
    public function index(){
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
			->limit("'".$int_Limitl.",".$int_Limitr."'")
			->select();
		foreach ($arr_Fetch['userlist'] as $key => $value) {
			unset($arr_Fetch['userlist'][$key]['password']);
		}
		$this->assign('result', $arr_Fetch);
		return $this->fetch('index/memberlist');
    }
    public function userban(){
    	checklib::isadminlog();
    	if($_GET['is']==='ban'){
    		$data['status']=1;
    	}else{
    		$data['status']=0;
    	}
		$_GET['uid']=intval($_GET['uid']);
        Db::name('user')->where('uid',$_GET['uid'])->update($data);
        $this->success('操作成功', './admin/Memberlist');
    }
    public function userdel(){
    	checklib::isadminlog();
        Db::name('user')->delete($_GET['uid']);
        $this->success('操作成功', './admin/Memberlist');
    }
    public function userupdate(){
    	checklib::isadminlog();
        $int_Uid=intval($_POST['info']['id']);
        $data['password']=checklib::handlepassword(trim($_POST['info']['pass']));
        Db::name('user')->where('uid',$int_Uid)->update($data);
    }
    public function useradd(){
    	checklib::isadminlog();

        $str_Name = input('post.username');
        $str_Passwd = input('post.password');
        $str_Mail = input('post.mail');
        $str_captcha = input('post.captcha');
        if(empty($str_Name)||empty($str_Passwd)||empty($str_Mail)){
            $this->error('用户名,密码,邮箱不能为空!');
        }
        if(!filter_var($str_Mail, FILTER_VALIDATE_EMAIL)){
            $this->error('邮箱格式错误!');
        }
        $arr_info = Db::name('user')->where('name',$str_Name)->find();
        if(!empty($arr_info)){
            $this->error('用户名已存在!');
        }
        $data = ['name' => $str_Name, 'password' => checklib::handlepassword(trim($str_Passwd)),'mail'=>$str_Mail,'identity'=>'0'];
        if(Db::name('user')->insert($data)>0){
            $this->success('添加成功', './Memberlist');
        }
    }
}
