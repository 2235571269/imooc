<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $this->_siteConfig->name;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."public/css/twitter-bootstrap/3.3.7/css/bootstrap.min.css";?>">
</head>

<body>
	<div class="container">
		<div class="page-header">
			<div class="alert alert-danger">
			    <h1><?php echo $msg = IReq::get('message') ? htmlspecialchars(IReq::get('message'),ENT_QUOTES) : '发生错误';?></h1>
			</div>
		</div>

		<div class="alert alert-success">
			<p>1.检查刚才的输入</p>
			<p>2.去其他操作：<a href='javascript:void(0)' class='blue' onclick='window.history.go(-1);'>返回上一级操作</a> | <a class="blue" href="<?php echo IUrl::creatUrl("/system/default");?>">后台首页</a> | <a class="blue" href="<?php echo IUrl::creatUrl("/system/navigation");?>">快捷菜单</a> | <a class="blue" href="<?php echo IUrl::creatUrl("/admin/logout");?>">退出登录</a> </p>
		</div>
	</div>
</body>
</html>