<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"D:\01_q\phpStudy\PHPTutorial\WWW\tp\public/../application/admin\view\index\welcome.html";i:1547189474;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-<?php echo $result['GWeb']['title']; ?></title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="shortcut icon" href="__PUBLIC__favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="/static/css/font.css" />
        <link rel="stylesheet" type="text/css" href="/static/css/xadmin.css" />
        <script type="text/javascript" src="/static/lib/layui/layui.js"></script>
        <script type="text/javascript" src="/static/js/xadmin.js"></script>
    </head>
    <body>
    <div class="x-body layui-anim layui-anim-up">
        <blockquote class="layui-elem-quote">欢迎管理员：
            <span class="x-red"><?php echo $result['userinfo']['name']; ?></span>！当前时间:2018-04-25 20:50:53</blockquote>
        <fieldset class="layui-elem-field">
            <legend>数据统计</legend>
            <div class="layui-field-box">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body">
                            <div class="layui-carousel x-admin-carousel x-admin-backlog" lay-anim="" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 90px;">
                                <div carousel-item="">
                                    <ul class="layui-row layui-col-space10 layui-this">
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>会员数</h3>
                                                <p>
                                                    <cite><?php echo $result['Webinfo']['countuser']; ?></cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>会员数</h3>
                                                <p>
                                                    <cite>12</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>回复数</h3>
                                                <p>
                                                    <cite>99</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>商品数</h3>
                                                <p>
                                                    <cite>67</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>文章数</h3>
                                                <p>
                                                    <cite>67</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>文章数</h3>
                                                <p>
                                                    <cite>6766</cite></p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>日志</legend>
            <div class="layui-field-box">
                <table class="layui-table" lay-skin="line">
                    <tbody>
                        <tr>
                            <td >
                                <a class="x-a" target="_blank">用户ID</a>
                            </td>
                            <td >
                                <a class="x-a" target="_blank">用户名</a>
                            </td>
                            <td >
                                <a class="x-a" target="_blank">登录时间</a>
                            </td>
                            <td >
                                <a class="x-a" target="_blank">登录IP</a>
                            </td>
                            <td >
                                <a class="x-a" target="_blank">地理位置</a>
                            </td>
                        </tr>
                        <?php if(is_array($result['Webinfo']['log']) || $result['Webinfo']['log'] instanceof \think\Collection || $result['Webinfo']['log'] instanceof \think\Paginator): $i = 0; $__LIST__ = $result['Webinfo']['log'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <td >
                                    <a class="x-a" target="_blank"><?php echo $vo['uid']; ?></a>
                                </td>
                                <td >
                                    <a class="x-a" target="_blank"><?php echo $vo['name']; ?></a>
                                </td>
                                <td >
                                    <a class="x-a" target="_blank"><?php echo $vo['lastlog']; ?></a>
                                </td>
                                <td >
                                    <a class="x-a" target="_blank"><?php echo $vo['user_ip']; ?></a>
                                </td>
                                <td >
                                    <a class="x-a" target="_blank"><?php echo $vo['address']; ?></a>
                                </td>
                            </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>系统信息</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                        <tr>
                            <th>版本</th>
                            <td>Beta1.0.0</td></tr>
                        <tr>
                            <th>服务器地址</th>
                            <td>x.xuebingsi.com</td></tr>
                        <tr>
                            <th>操作系统</th>
                            <td>WINNT</td></tr>
                        <tr>
                            <th>运行环境</th>
                            <td>Apache/2.4.23 (Win32) OpenSSL/1.0.2j mod_fcgid/2.3.9</td></tr>
                        <tr>
                            <th>PHP版本</th>
                            <td>5.6.27</td></tr>
                        <tr>
                            <th>PHP运行方式</th>
                            <td>cgi-fcgi</td></tr>
                        <tr>
                            <th>MYSQL版本</th>
                            <td>5.5.53</td></tr>
                        <tr>
                            <th>ThinkPHP</th>
                            <td>5.0.18</td></tr>
                        <tr>
                            <th>上传附件限制</th>
                            <td>2M</td></tr>
                        <tr>
                            <th>执行时间限制</th>
                            <td>30s</td></tr>
                        <tr>
                            <th>剩余空间</th>
                            <td>86015.2M</td></tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>开发团队</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                        <tr>
                            <th>版权所有</th>
                            <td>secondar
                                <a href="https://www.imoecg.com/" class='x-a' target="_blank">访问官网</a></td>
                        </tr>
                        <tr>
                            <th>开发者</th>
                            <td>secondar(www.imoecg.com)</td></tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <blockquote class="layui-elem-quote layui-quote-nm">感谢layui,百度Echarts,jquery,本系统由x-admin提供技术支持。</blockquote>
    </div>
       
    </body>
</html>