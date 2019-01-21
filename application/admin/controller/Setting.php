<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use lib\checklib;
use think\Config;
use think\Session;
class Setting extends Controller
{
    public function index(){
    	checklib::isadminlog();
		$this->assign('result', Config::get('GWeb'));
		return $this->fetch('index/setting');
    }
    public function saver(){
        $strFile=dirname(dirname(__DIR__)).'/config.php';
        $arrCondig=include($strFile);
        $arrCondig['GWeb']['title']=input('post.title');
        $arrCondig['GWeb']['sontitle']=input('post.ftitle');
        $arrCondig['GWeb']['siteurl']=input('post.siteurl');
        $arrCondig['GWeb']['keywords']=input('post.keywords');
        $arrCondig['GWeb']['describe']=input('post.describe');
        $arrCondig['GWeb']['email']=input('post.email');
        $arrCondig['GWeb']['icp']=input('post.icp');
        $content = '<?php' . "\n" .'return '. var_export( $arrCondig, true ) . ';' . "\n" . '?>';
        $fp = fopen($strFile,'w');
        fwrite($fp,$content);
        fclose($fp);
        $this->success('操作成功', '/admin/setting');
    }
}
