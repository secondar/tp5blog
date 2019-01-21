<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"D:\01_q\phpStudy\PHPTutorial\WWW\tp\public/../application/admin\view\index\article.html";i:1547632558;}*/ ?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>文章</title>
<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/static/css/style.css">
<link rel="stylesheet" type="text/css" href="/static/css/font-awesome.min.css">
<link rel="apple-touch-icon-precomposed" href="/static/images/icon/icon.png">
<link rel="shortcut icon" href="/static/images/icon/favicon.ico">
<script src="/static/js/jquery-2.1.4.min.js"></script>
</head>

<body>
<section class="container-fluid">
  <div class="row">
    <div id="main">
      <form action="/Article/checkAll" method="post" >
        <ol class="breadcrumb">
          <li><a href="/admin/Article/add">增加文章</a></li>
        </ol>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th><span class="glyphicon glyphicon-th-large"></span> <span class="visible-lg">选择</span></th>
                <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">标题</span></th>
                <th><span class="glyphicon glyphicon-list"></span> <span class="visible-lg">栏目</span></th>
                <!-- <th class="hidden-sm"><span class="glyphicon glyphicon-tag"></span> <span class="visible-lg">标签</span></th> -->
                <th class="hidden-sm"><span class="glyphicon glyphicon-comment"></span> <span class="visible-lg">评论</span></th>
                <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">日期</span></th>
                <th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th>
              </tr>
            </thead>
            <tbody>
              <?php if(is_array($result['articlelist']) || $result['articlelist'] instanceof \think\Collection || $result['articlelist'] instanceof \think\Paginator): $i = 0; $__LIST__ = $result['articlelist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
              <tr>
                <td><input type="checkbox" class="input-control" name="checkbox[]" value="<?php echo $vo['id']; ?>" /></td>
                <td class="article-title"><?php echo $vo['title']; ?></td>
                <td><?php echo $vo['category']; ?></td>
                <!-- <td class="hidden-sm">PHP、JavaScript</td> -->
                <td class="hidden-sm"><?php echo $vo['comment']; ?></td>
                <td><?php echo $vo['submit_date']; ?></td>
                <td><a href="update-article.html">修改</a> <a rel="<?php echo $vo['id']; ?>">删除</a></td>
              </tr>
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
          </table>
        </div>
        <footer class="message_footer">
          <nav>
            <div class="btn-toolbar operation" role="toolbar">
              <div class="btn-group" role="group"> <a class="btn btn-default" onClick="select()">全选</a> <a class="btn btn-default" onClick="reverse()">反选</a> <a class="btn btn-default" onClick="noselect()">不选</a> </div>
              <div class="btn-group" role="group">
                <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="删除全部选中" name="checkbox_delete">删除</button>
              </div>
            </div>
            <ul class="pagination pagenav">
              <li class="disabled"><a href="/admin/Article?limit=<?php echo $result['limitback']; ?>" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>
              
              <li><a href="/admin/Article?limit=<?php echo $result['limit']; ?>" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>
            </ul>
          </nav>
        </footer>
      </form>
    </div>
  </div>
</section>
<script src="/static/js/bootstrap.min.js"></script> 
<script src="/static/js/admin-scripts.js"></script> 
<script>
//是否确认删除
$(function(){   
	$("#main table tbody tr td a").click(function(){
		var name = $(this);
		var id = name.attr("rel"); //对应id  
		if (event.srcElement.outerText == "删除") 
		{
			if(window.confirm("此操作不可逆，是否确认？"))
			{
				$.ajax({
					type: "POST",
					url: "/Article/delete",
					data: "id=" + id,
					cache: false, //不缓存此页面   
					success: function (data) {
						window.location.reload();
					}
				});
			};
		};
	});   
});
</script>
</body>
</html>
