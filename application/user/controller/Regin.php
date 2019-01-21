<?php
namespace app\user\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use lib\checklib;
class Regin extends Controller
{
    public function index(){
        //验证是否登录
        $session = new Session();
        if ($session->has('userinfo')) {
            $this->redirect('index/index');
        }
        return $this->fetch();
    }

    // //登录操作
    public function regin(){
        if(!request()->isPost()){
            // $this->success('新增成功', 'User/list');
            $this->redirect('index/index');
        }

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
            $this->success('注册成功', '/index');
        }
        
    }
}
