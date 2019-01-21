<?php
namespace app\user\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use lib\checklib;
use think\Config;
class Index extends Controller
{
    //登录界面
    public function index(){
        //验证是否登录成功
        if (Session::has('userinfo')) {
            $view_replace_str=Config::get('view_replace_str');
            $this->redirect('index/index');
        }
        $this->assign('result', Config::get('GWeb'));
        return $this->fetch();
    }

    //登录操作
    public function login(){
        if(!request()->isPost()){
            $this->redirect('index/index');
        }
        $str_Name = input('post.username');
        $str_Passwd = input('post.password');
        $str_captcha = input('post.captcha');
        if(empty($str_Name)||empty($str_Passwd)){
            $this->error('账号密码不能为空!');
        }
        $arr_info = Db::name('user')
        	->where('name', $str_Name)
        	->where('password',checklib::handlepassword(trim($str_Passwd)))
        	->find();
        if(empty($arr_info)){
        	echo false;
            exit();
        }
        //更新会员数据
        $data['user_ip'] = request()->ip();
		$data['logtimes']=$arr_info['logtimes']+1;
		$data['lastlog']=date('Y-m-d H:i:s');
        Db::name('user')->where('uid',$arr_info['uid'])->update($data);
	    //写入日志
	    $data['uid']=$arr_info['uid'];
		$data['name']=$arr_info['name'];
		unset($data['logtimes']);
		$data['address']=checklib::ipaddress(request()->ip());
	    Db::name('log')->insert($data);
	    unset($arr_info['password']);
	    Session::set('userinfo',$arr_info);
        echo true;
        // $this->success('登录成功', './admin/index');
    }
}
