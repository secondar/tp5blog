<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"D:\01_q\phpStudy\PHPTutorial\WWW\tp\public/../application/admin\view\index\setting.html";i:1547631333;}*/ ?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>设置</title>
<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/static/css/style.css">
<link rel="stylesheet" type="text/css" href="/static/css/font-awesome.min.css">
<link rel="apple-touch-icon-precomposed" href="/static/images/icon/icon.png">
<link rel="shortcut icon" href="/static/images/icon/favicon.ico">
<script src="/static/js/jquery-2.1.4.min.js"></script>

</head>

<body class="user-select">
<section class="container-fluid">
  
  <div class="row">
    <div id="main">
      <div class="row">
        <form action="/admin/setting/saver" method="post" autocomplete="off" draggable="false">
          <div class="col-md-9">
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>站点标题</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="title" class="form-control" placeholder="请输入站点标题" value="<?php echo $result['title']; ?>" required autofocus autocomplete="off">
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>副标题</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="ftitle" class="form-control" placeholder="请输入站点副标题" value="<?php echo $result['sontitle']; ?>"autocomplete="off">
                <span class="prompt-text">用简洁的文字描述本站点。</span> </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>站点地址（URL）</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="siteurl" class="form-control" placeholder="在此处输入站点地址（URL）" value="<?php echo $result['siteurl']; ?>" required autocomplete="off">
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>站点关键字</span></h2>
              <div class="add-article-box-content">
                <textarea class="form-control" name="keywords" autocomplete="off"><?php echo $result['keywords']; ?></textarea>
                <span class="prompt-text">关键字会出现在网页的keywords属性中。</span> </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>站点描述</span></h2>
              <div class="add-article-box-content">
                <textarea class="form-control" name="describe" rows="4" autocomplete="off"><?php echo $result['describe']; ?></textarea>
                <span class="prompt-text">描述会出现在网页的description属性中。</span> </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>电子邮件地址</span></h2>
              <div class="add-article-box-content">
                <input type="email" name="email" class="form-control" placeholder="在此处输入邮箱" value="<?php echo $result['email']; ?>" autocomplete="off" />
                <span class="prompt-text">这个电子邮件地址仅为了管理方便而填写</span> </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>ICP备案号</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="icp" class="form-control" placeholder="在此处输入备案号" value="<?php echo $result['icp']; ?>" autocomplete="off" />
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>保存</span></h2>
              <div class="add-article-box-content">
              <span class="prompt-text">请确定您对所有选项所做的更改</span>
              </div>
              <div class="add-article-box-footer">
                <button class="btn btn-primary" type="submit" name="submit">更新</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<script src="/static/js/bootstrap.min.js"></script> 
<script src="/static/js/admin-scripts.js"></script>
</body>
</html>