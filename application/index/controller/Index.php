<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller
{
    public function index($name = 'World')
    {
       $data = Db::name('user')->find();
        $this->assign('result', $data);
        return $this->fetch();
    }
	public function hello($name = 'thinkphp')
    {
		$this->assign('name',$name);
        return $this->fetch();//'Hello, thinkphp!';
    }
	public function test()
    {
        return '这是一个测试方法!';
    }
}
