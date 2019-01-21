<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use lib\checklib;
use think\Config;
use think\Session;
class Article extends Controller
{
    public function index(){
    	checklib::isadminlog();
		$arr_Fetch['userinfo']=Session::get('userinfo');
		$arr_Fetch['GWeb']=Config::get('GWeb');
		if(empty($_GET['limit'])||$_GET['limit']<0){
			$_GET['limit']=1;
		}
        $arr_Fetch['limit']=$_GET['limit']+1;
        $arr_Fetch['limitback']=$_GET['limit']-1;
		$int_Limitr=$_GET['limit']*50;
		if($_GET['limit']==1){
			$int_Limitl=0;
		}else{
			$int_Limitl=($_GET['limit']-1)*50;
		}
		$arr_Fetch['articlelist']=Db::name('article')
			->limit("'".$int_Limitl.",".$int_Limitr."'")
			->select();
        $arr_classlist=Db::name('category')
            ->select();
        foreach ($arr_Fetch['articlelist'] as $k => $v) {
            foreach ($arr_classlist as $key => $value) {
                if($v['category']==$value['id']){
                    $arr_Fetch['articlelist'][$k]['category']=$value['name'];
                    continue;
                }
            }
        }
		$this->assign('result', $arr_Fetch);
		return $this->fetch('index/article');
    }
    public function add(){
        checklib::isadminlog();
        $category=Db::name('category')
            ->select();
        $this->assign('result', $category);
        return $this->fetch('index/editarticle');
    }
    public function saver(){
        $data['title']=input('post.title');
        $data['keywords']=input('post.keywords');
        $data['describe']=input('post.describe');
        $data['category']=input('post.category');
        $data['tags']=input('post.tags');
        $data['content']=input('post.content');
        $data['submit_date']=input('post.time');
        $userinfo=Session::get('userinfo');
        $data['uid']=$userinfo['uid'];
        if(Db::name('article')->insert($data)>0){
            $this->success('发布成功', '/admin/Article/add');
        }
    }
    public function category(){
        checklib::isadminlog();
        $category=Db::name('category')
            ->select();
        $this->assign('result', $category);
        return $this->fetch('index/category');
    }
    public function categoryadd(){
         checklib::isadminlog();
         $data['name']=input('post.name');
         $data['keywords']=input('post.keywords');
         $data['describe']=input('post.describe');
         if(Db::name('category')->insert($data)>0){
            $this->success('添加成功', '/admin/Article/category');
         }
    }
}
