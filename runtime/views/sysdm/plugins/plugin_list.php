<!DOCTYPE html>
<html>

<head>
    <title>后台管理</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?php echo $this->getWebSkinPath()."css/admin.css";?>" />
    <!--[if lt IE 9]>
	<script src="<?php echo $this->getWebViewPath()."javascript/html5shiv.min.js";?>"></script>
	<script src="<?php echo $this->getWebViewPath()."javascript/respond.min.js";?>"></script>
	<![endif]-->
    <meta name="robots" content="noindex,nofollow">
    <link rel="shortcut icon" href="<?php echo IUrl::creatUrl("")."favicon.ico";?>" />
    <script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/jquery/jquery-1.12.4.min.js"></script> <script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/artdialog/artDialog.js?v=4.8"></script><script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/artdialog/plugins/iframeTools.js"></script><link rel="stylesheet" type="text/css" href="/iWebShop5.5/runtime/_systemjs/artdialog/skins/black.css" /> <script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/form/form.js"></script> <script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/autovalidate/validate.js?v=5.1"></script><link rel="stylesheet" type="text/css" href="/iWebShop5.5/runtime/_systemjs/autovalidate/style.css" /> <script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/artTemplate/artTemplate.js"></script><script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/artTemplate/artTemplate-plugin.js"></script> <script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/cookie/jquery.cookie.js"></script>
    <script type='text/javascript' src="<?php echo IUrl::creatUrl("")."public/javascript/twitter-bootstrap/3.3.7/js/bootstrap.min.js";?>"></script>
    <script type='text/javascript' src="<?php echo $this->getWebViewPath()."javascript/adminlte.min.js";?>"></script>
    <script type='text/javascript' src="<?php echo IUrl::creatUrl("")."public/javascript/public.js";?>"></script>
</head>

<body class="skin-blue fixed sidebar-mini" style="height: auto; min-height: 100%;">
    <div class="wrapper" style="height: auto; min-height: 100%;">
        <header class="main-header">
            <div class="logo">
                <span class="logo-mini"><b>iWeb</b></span>
                <span class="logo-lg"><b>iWebShop</b>后台管理</span>
            </div>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only"></span>
                </a>

                <!--顶部菜单 开始-->
                <div id="menu" class="navbar-custom-menu">
                    <ul class="nav navbar-nav" name="topMenu">
                        <?php $menuData=menu::init($this->admin['role_id']);?>
                        <?php foreach($items=menu::getTopMenu($menuData) as $key => $item){?>
                        <li><a hidefocus="true" href="<?php echo IUrl::creatUrl("".$item."");?>"><?php echo isset($key)?$key:"";?></a></li>
                        <?php }?>
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
                 <!--顶部菜单 结束-->
            </nav>
        </header>

		<!--左侧菜单 开始-->
        <aside id="admin_left" class="main-sidebar">
            <section class="sidebar" style="height: auto;">
                <div class="user-panel">
                    <div class="pull-left image">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="pull-left info">
                        <p><?php echo isset($this->admin['admin_name'])?$this->admin['admin_name']:"";?></p>
                        <a href="#"><?php echo isset($this->admin['admin_role_name'])?$this->admin['admin_role_name']:"";?></a>
                    </div>
                </div>

                <?php $leftMenu=menu::get($menuData,IWeb::$app->getController()->getId().'/'.IWeb::$app->getController()->getAction()->getId());$modelName = key($leftMenu);$modelValue = current($leftMenu);?>
                <ul class="sidebar-menu tree" data-widget="tree">
                    <li class="header"><?php echo isset($modelName)?$modelName:"";?>模块菜单</li>
                    <?php foreach($items=$modelValue as $key => $item){?>
                    <li class="treeview">
                        <a href="#">
                        	<i class="fa" name="ico" menu="<?php echo isset($key)?$key:"";?>"></i>
                            <span><?php echo isset($key)?$key:"";?></span>
                            <span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
                        </a>
                        <ul class="treeview-menu" name="leftMenu">
                            <?php foreach($items=$item as $leftKey => $leftValue){?>
                            <li><a href="<?php echo IUrl::creatUrl("".$leftKey."");?>"><i class="fa fa-circle-o"></i><?php echo isset($leftValue)?$leftValue:"";?></a></li>
                            <?php }?>
                        </ul>
                    </li>
                    <?php }?>

                    <?php foreach($items=Api::run('getQuickNavigaAll') as $key => $item){?>
                    <li class="header">快速导航</li>
                    <li><a href="<?php echo isset($item['url'])?$item['url']:"";?>"><i class="fa fa-star-o"></i> <span><?php echo isset($item['naviga_name'])?$item['naviga_name']:"";?></span></a></li>
                    <?php }?>
                </ul>
            </section>
        </aside>
        <!--左侧菜单 结束-->

		<!--右侧内容 开始-->
        <div id="admin_right" class="content-wrapper">
            <div class="breadcrumbs" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="home-icon fa fa-home"></i>
			<a href="#">插件</a>
		</li>
		<li>
			<a href="#">插件管理</a>
		</li>
		<li class="active">插件列表</li>
	</ul>
</div>
<div class="content">
	<table class="table table-hover list-table">
		<colgroup>
			<col width="180px">
			<col />
			<col width="150px">
			<col width="90px">
		</colgroup>

		<thead>
			<tr>
				<th>名称</th>
				<th>描述</th>
				<th>状态</th>
				<th>操作</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($items=plugin::getItems() as $key => $item){?>
			<tr>
				<td><?php echo isset($item['name'])?$item['name']:"";?></td>
				<td><?php echo isset($item['description'])?$item['description']:"";?></td>
				<td>
                	<?php if($item['is_open'] == 1){?>
                	<span class="bg-green badge">使用中</span>
                	<?php }else{?>
                	<span class="bg-red badge">已关闭</span>
                	<?php }?>

                	<?php if($item['is_install'] == 1){?>
                	<span class="bg-green badge">已安装</span>
                	<?php }else{?>
                	<span class="bg-red badge">未安装</span>
                	<?php }?>
				</td>
				<td>
					<?php if($item['is_install'] == 1){?>
					<a href="<?php echo IUrl::creatUrl("/plugins/plugin_edit/class_name/".$item['class_name']."");?>"><i class='operator fa fa-edit' title='修改插件'></i></a>
					<a href="javascript:delModel({link:'<?php echo IUrl::creatUrl("/plugins/plugin_del/class_name/".$item['class_name']."");?>'});"><i class='operator fa fa-close' title='删除插件'></i></a>
					<?php }else{?>
					<a href="javascript:install('<?php echo isset($item['class_name'])?$item['class_name']:"";?>');"><i class='operator fa fa-plus' title='添加插件'></i></a>
					<?php }?>
				</td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
//安装插件提示
function install(class_name)
{
	var url = "<?php echo IUrl::creatUrl("/plugins/plugin_add/class_name/@class_name@");?>";
	url     = url.replace("@class_name@",class_name);
	window.confirm("确定要安装此插件到系统么？","window.location.href='"+url+"'");
}
</script>
        </div>
        <!--右侧内容 结束-->

		<!--顶部弹出菜单 开始-->
	    <aside class="control-sidebar control-sidebar-dark">
	        <ul class="control-sidebar-menu">
	            <li><a href="<?php echo IUrl::creatUrl("/admin/logout");?>"><i class="fa fa-circle-o text-red"></i> 退出管理</a></li>
	            <li><a href="<?php echo IUrl::creatUrl("/system/admin_repwd");?>"><i class="fa fa-circle-o text-yellow"></i> 修改密码</a></li>
	            <li><a href="<?php echo IUrl::creatUrl("/system/default");?>"><i class="fa fa-circle-o text-green"></i> 后台首页</a></li>
	            <li><a href="<?php echo IUrl::creatUrl("");?>" target='_blank'><i class="fa fa-circle-o text-aqua"></i> 商城首页</a></li>
	            <li><a href="<?php echo IUrl::creatUrl("/system/navigation");?>"><i class="fa fa-circle-o"></i> 快速导航</a></li>
	        </ul>
	    </aside>
	    <!--顶部弹出菜单 结束-->
    </div>
</body>
<script type='text/javascript'>
//图标配置
var icoConfig = {"商品管理":"fa-inbox","商品分类":"fa-list","品牌":"fa-registered","模型":"fa-cubes","搜索":"fa-search","会员管理":"fa-user-o","商户管理":"fa-group","信息处理":"fa-comment-o","订单管理":"fa-file-text","单据管理":"fa-files-o","发货地址":"fa-address-card-o","促销活动":"fa-bullhorn","营销活动":"fa-bell-o","优惠券管理":"fa-ticket","基础数据统计":"fa-bar-chart-o","后台首页":"fa-home","日志操作记录":"fa-file-code-o","商户数据统计":"fa-pie-chart","支付管理":"fa-credit-card","第三方平台":"fa-share-alt","配送管理":"fa-truck","地域管理":"fa-street-view","权限管理":"fa-unlock-alt","数据库管理":"fa-database","文章管理":"fa-file-o","帮助管理":"fa-question-circle-o","广告管理":"fa-flag","公告管理":"fa-bookmark-o","网站地图":"fa-sitemap","插件管理":"fa-cogs","网站管理":"fa-wrench"};
$('i[name="ico"]').each(function()
{
	var menuName = $(this).attr('menu');
	if(menuName && icoConfig[menuName])
	{
		$(this).addClass(icoConfig[menuName]);
	}
	else
	{
		//默认图标
		$(this).addClass("fa-circle");
	}
});

//兼容IE系列
$("[name='leftMenu'] [href^='javascript:']").each(function(i)
{
	var fun = $(this).attr('href').replace("javascript:","");
	$(this).attr('href','javascript:void(0)');
	$(this).on("click",function(){eval(fun)});
});

//按钮高亮
var topItem = "<?php echo $modelName;?>";
$("[name='topMenu']>li:contains('"+topItem+"')").addClass("active");

//获取左侧菜单项
function matchLeftMenu(leftItem)
{
    var matchObject = $('[name="leftMenu"]>li a[href="'+leftItem+'"]');
    if(matchObject.length > 0)
    {
        $.cookie('lastUrl', leftItem);
        return matchObject;
    }

    var lastUrl = $.cookie('lastUrl');
    if(lastUrl)
    {
        return $('[name="leftMenu"]>li a[href="'+lastUrl+'"]');
    }
    return null;
}

//左边栏菜单高亮
var leftItem   = "<?php echo IUrl::getUri();?>";
var matchObject = matchLeftMenu(leftItem);
if(matchObject)
{
    matchObject.parent().addClass("active").parent('ul').show().parent('.treeview').addClass('menu-open');
}
</script>
</html>