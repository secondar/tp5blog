<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use lib\checklib;
use think\Config;
use think\Session;
class flink extends Controller
{
    public function index(){
    	checklib::isadminlog();
		$arr_Fetch['userinfo']=Session::get('userinfo');
		$arr_Fetch['GWeb']=Config::get('GWeb');
        $arr_Fetch['link']=Db::name('link')
            ->select();
		$this->assign('result', $arr_Fetch);
		return $this->fetch('index/flink');
    }
    public function linkadd(){
        checklib::isadminlog();
        return $this->fetch('index/flinkadd');
    }
    public function flinkadd(){
        checklib::isadminlog();
         $data['name']=input('post.name');
         $data['url']=input('post.url');
         $data['imgurl']=input('post.imgurl');
         $data['describe']=input('post.describe');
         $data['target']=input('post.target');
         $data['rel']=input('post.rel');
         $data['submit_date']=input('post.time');
         if(Db::name('link')->insert($data)>0){
            $this->success('添加成功', '/admin/flink');
         }
    }
    public function flinkdel(){
        Db::name('link')->delete(input('post.id'));
        echo true;
    }
}
