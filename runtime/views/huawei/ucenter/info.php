<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->_siteConfig->name;?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link type="image/x-icon" href="<?php echo IUrl::creatUrl("")."favicon.ico";?>" rel="icon">
	<script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/jquery/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/form/form.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/autovalidate/validate.js?v=5.1"></script><link rel="stylesheet" type="text/css" href="/iWebShop5.5/runtime/_systemjs/autovalidate/style.css" />
	<script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/artdialog/artDialog.js?v=4.8"></script><script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/artdialog/plugins/iframeTools.js"></script><link rel="stylesheet" type="text/css" href="/iWebShop5.5/runtime/_systemjs/artdialog/skins/black.css" />
	<script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/artTemplate/artTemplate.js"></script><script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/artTemplate/artTemplate-plugin.js"></script>
	<!--[if IE]><script src="<?php echo $this->getWebViewPath()."javascript/html5.js";?>"></script><![endif]-->
	<script src='<?php echo $this->getWebViewPath()."javascript/site.js";?>'></script>
	<link rel="stylesheet" href="<?php echo $this->getWebSkinPath()."style/style.css";?>">
  <script type='text/javascript' src='<?php echo IUrl::creatUrl("")."public/javascript/public.js";?>'></script>
</head>
<body>

<!-- 顶部工具栏 -->
<div class="header_top">
	<div class="web">
		<div class="welcome">
			欢迎您来到 <?php echo $this->_siteConfig->name;?>！
		</div>
		<ul class="top_tool">
			<li><a href="<?php echo IUrl::creatUrl("ucenter/index");?>">个人中心</a></li>
			<li><a href="<?php echo IUrl::creatUrl("/simple/seller");?>">申请开店</a></li>
			<li><a href="<?php echo IUrl::creatUrl("/seller/index");?>">商家管理</a></li>
			<li><a href="<?php echo IUrl::creatUrl("/site/help_list");?>">使用帮助</a></li>
		</ul>
	</div>
</div>
<!-- 顶部工具栏 -->
<header class="header">
	<!-- logo与搜索 -->
	<div class="body_wrapper">
		<div class="web">
			<!-- logo -->
			<div class="logo_layer">
				<a title="<?php echo $this->_siteConfig->name;?>" href="<?php echo IUrl::creatUrl("");?>" class="logo">
					<img src="<?php if($this->_siteConfig->logo){?><?php echo IUrl::creatUrl("")."".$this->_siteConfig->logo."";?><?php }else{?><?php echo $this->getWebSkinPath()."image/logo.png";?><?php }?>">
				</a>
			</div>
			<!-- 注册与登录 -->
			<div class="body_toolbar">
				<?php if($this->user){?>
					<div class="body_toolbar_btn userinfo">
						<a href="<?php echo IUrl::creatUrl("/ucenter/index");?>"><?php echo isset($this->user['username'])?$this->user['username']:"";?></a>
						<i></i>
					</div>
					<div class="body_toolbar_layer">
						<div class="toolbar_layer_info">
							<a class="info_photo" href="<?php echo IUrl::creatUrl("/ucenter/index");?>">
								<img id="user_ico_img" src="<?php echo IUrl::creatUrl("".$this->user['head_ico']."");?>" onerror="this.src='<?php echo $this->getWebSkinPath()."image/user_ico.gif";?>'">
							</a>
							<div>
								<a href="<?php echo IUrl::creatUrl("/ucenter/index");?>"><?php echo isset($this->user['username'])?$this->user['username']:"";?> <i class="fa fa-user-md"></i></a>
								<span><?php echo ISafe::get('last_login');?></span>
							</div>
						</div>
						<div class="myorder">
							<dl class="clearfix">
								<dt>
									<span class="fl">我的订单</span>
									<a class="fr" href="<?php echo IUrl::creatUrl("/ucenter/index");?>">更多&gt;</a>
								</dt>
								<dd><a href="<?php echo IUrl::creatUrl("/ucenter/integral");?>">我的积分</a></dd>
								<dd><a href="<?php echo IUrl::creatUrl("/ucenter/account_log");?>">账户余额</a></dd>
								<dd><a href="<?php echo IUrl::creatUrl("/ucenter/evaluation");?>">待评价</a></dd>
								<dd><a href="<?php echo IUrl::creatUrl("/ucenter/refunds");?>">退换货</a></dd>
								<dd><a href="<?php echo IUrl::creatUrl("/ucenter/consult");?>">商品咨询</a></dd>
							</dl>
						</div>
						<div class="myshop"><a href="<?php echo IUrl::creatUrl("/ucenter/index");?>">我的商城</a></div>
						<div class="logout"><a href="<?php echo IUrl::creatUrl("/simple/logout");?>">退出登录</a></div>
					</div>
				<?php }else{?>
					<div class="body_toolbar_btn login_reg">
						<a href="<?php echo IUrl::creatUrl("/simple/login");?>">登录</a>
						<em> | </em>
						<a class="reg" href="<?php echo IUrl::creatUrl("/simple/reg");?>">注册</a>
					</div>
				<?php }?>
			</div>
			<!-- 注册与登录 -->
			<!--购物车模板 开始-->
			<div class="header_cart" name="mycart">
				<a href="<?php echo IUrl::creatUrl("/simple/cart");?>" class="go_cart">
					<i class="fa fa-shopping-cart"></i>
					<em class="sign_total" name="mycart_count"]>0</em>
				</a>
				<div class="cart_simple" id="div_mycart"></div>
			</div>
			<script type='text/html' id='cartTemplete'>
			<div class='cart_panel'>
				<%if(goodsCount){%>
					<!-- 购物车物品列表 -->
					<ul class='cart_list'>
						<%for(var item in goodsData){%>
						<%var data = goodsData[item]%>
						<li id="site_cart_dd_<%=item%>">
							<em><%=(window().parseInt(item)+1)%></em>
							<a target="_blank" href="<?php echo IUrl::creatUrl("/site/products/id/<%=data['goods_id']%>");?>">
								<img src="<%=webroot(data['img'])%>">
							</a>
							<a class="shop_name" target="_blank" href="<?php echo IUrl::creatUrl("/site/products/id/<%=data['goods_id']%>");?>"><%=data['name']%></a>
							<!-- <p class="shop_class"></p> -->
							<div class="shop_price"><p>￥ <%=data['sell_price']%> <span>x <%=data['count']%></span></p></div>
							<i class="fa fa-remove" onclick="removeCart('<%=data['id']%>','<%=data['type']%>');$('#site_cart_dd_<%=item%>').hide('slow');"></i>
						</li>
						<%}%>
					</ul>
					<!-- 购物车物品列表 -->
					<!-- 购物车物品统计 -->
					<div class="cart_total">
						<p>
							共<span name="mycart_count"><%=goodsCount%></span>件
							总额：<em name="mycart_sum">￥<%=goodsSum%></em>
						</p>
						<a href="<?php echo IUrl::creatUrl("simple/cart");?>">结算</a>
					</div>
					<!-- 购物车物品统计 -->
				<%}else{%>
					<!-- 购物车无内容 -->
					<div class='cart_no'>购物车空空如也~</div>
				<%}%>
			</div>
			</script>
			<!--购物车模板 结束-->
			<!-- 搜索框 -->
			<div class="search_box">
					<!-- 搜索内容 -->
				<form method='get' action='<?php echo IUrl::creatUrl("/");?>'>
					<input type='hidden' name='controller' value='site'>
					<input type='hidden' name='action' value='search_list'>
					<div class="search">
						<input type="text" name='word' class="search_keyword" autocomplete="off">
						<button class="search_submit" type="submit">
							<i class="fa fa-search"></i>
						</button>
					</div>
				</form>
				<!-- 热门搜索 -->
				<div class="search_hotwords">
					<?php foreach($items=Api::run('getKeywordList',2) as $key => $item){?>
					<?php $tmpWord = urlencode($item['word']);?>
					<a href="<?php echo IUrl::creatUrl("/site/search_list/word/".$tmpWord."");?>"><?php echo isset($item['word'])?$item['word']:"";?></a>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
	<!-- logo与搜索 -->

	<!-- 导航栏 -->
	<div class="nav_bar">
		<div class="user_center">
		<div class="web">
			<!-- 分类列表 -->
			<div class="category_list">
				<!-- 全部商品 -->
				<a class="all_goods_sort" href="" target="_blank">
					<h3 class="all">全部商品</h3>
				</a>
				<!-- 全部商品 -->
				<!-- 分类列表-详情 -->
				<ul class="cat_list none">
					<?php foreach($items=Api::run('getCategoryListTop') as $key => $first){?>
					<li>
						<!-- 分类列表-导航模块 -->
						<div class="cat_nav">
							<h3><a href="<?php echo IUrl::creatUrl("/site/pro_list/cat/".$first['id']."");?>"><?php echo isset($first['name'])?$first['name']:"";?></a></h3>
							<?php foreach($items=Api::run('getCategoryByParentid',array('#parent_id#',$first['id']), 3) as $key => $second){?>
							<a href="<?php echo IUrl::creatUrl("/site/pro_list/cat/".$second['id']."");?>"><?php echo isset($second['name'])?$second['name']:"";?></a>
							<?php }?>
							<i class="fa fa-angle-right"></i>
						</div>
						<!-- 分类列表-导航模块 -->
						<!-- 分类列表-导航内容模块 -->
						<div class="cat_more">
							<h3>
								<a href="<?php echo IUrl::creatUrl("/site/pro_list/cat/".$first['id']."");?>">
									<span><?php echo isset($first['name'])?$first['name']:"";?></span>
									<i class="fa fa-angle-right"></i>
								</a>
							</h3>
							<ul class="cat_nav_list">
								<?php foreach($items=Api::run('getCategoryByParentid',array('#parent_id#',$first['id']), 12) as $key => $second){?>
								<li><a href="<?php echo IUrl::creatUrl("/site/pro_list/cat/".$second['id']."");?>"><?php echo isset($second['name'])?$second['name']:"";?></a></li>
								<?php }?>
							</ul>
							<ul class="cat_content_list">
								<?php foreach($items=Api::run('getCategoryExtendList',array('#categroy_id#',$first['id']),4) as $key => $item){?>
								<li>
									<a href="<?php echo IUrl::creatUrl("/site/products/id/".$item['id']."");?>" target="_blank" title="<?php echo isset($item['name'])?$item['name']:"";?>">
										<img class="img-lazyload" src="<?php echo IUrl::creatUrl("/pic/thumb/img/".$item['img']."/w/118/h/118");?>" alt="<?php echo isset($item['name'])?$item['name']:"";?>">
										<h3><?php echo isset($item['name'])?$item['name']:"";?></h3>
										<p class="price">￥ <?php echo isset($item['sell_price'])?$item['sell_price']:"";?></p>
									</a>
								</li>
								<?php }?>
							</ul>
						</div>
						<!-- 分类列表-导航内容模块 -->
					</li>
					<?php }?>
				</ul>
				<!-- 分类列表-详情 -->
			</div>
			<!-- 分类列表 -->
			<!-- 导航索引 -->
			<div class="nav_index">
				<ul class="nav">
					<li class="user_nav_index"><a href="<?php echo IUrl::creatUrl("/site/index");?>"><span>首 页</span></a></li>
					<?php foreach($items=Api::run('getGuideList') as $key => $item){?>
					<li class="user_nav_index"><a href="<?php echo IUrl::creatUrl("".$item['link']."");?>"><span><?php echo isset($item['name'])?$item['name']:"";?></span></a></li>
					<?php }?>
				</ul>
			</div>
		</div>
		</div>
	</div>
</header>

<!-- 个人中心内容 -->
<div class="center_content">
	<section class="breadcrumb">
		<span></span> <a href="<?php echo IUrl::creatUrl("");?>">首页</a> \ <a href="<?php echo IUrl::creatUrl("/ucenter/index");?>">我的账户</a>
	</section>


	<section class="web">
		<div class="ucenter_content_bar">
			<section class="ucenter_main">
				<script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/areaSelect/areaSelect.js"></script>
<script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/my97date/wdatepicker.js"></script>
<header class="uc_head">
	<h3>个人资料</h3>
</header>

<section class="user_form">
	<form action='<?php echo IUrl::creatUrl("/ucenter/info_edit_act");?>' method='post' name='user_info'>
		<dl>
			<dt>头像：</dt>
			<dd>
				<div class="user_ico">
					<img id="user_ico_img" onclick="$('#userIcoFile').trigger('click');" src="<?php echo IUrl::creatUrl("".$userData['head_ico']."");?>" onerror="this.src='<?php echo $this->getWebSkinPath()."image/user_ico.gif";?>'">
				</div>
			</dd>
		</dl>
		<dl>
			<dt>会员组：</dt>
			<dd><?php echo isset($userData['group_name'])?$userData['group_name']:"";?></dd>
		</dl>
		<dl>
			<dt>姓名：</dt>
			<dd><input class="input_text" type="text" name="true_name" alt='请填写真实姓名' /></dd>
		</dl>
		<dl>
			<dt>性别：</dt>
			<dd>
				<label><input type='radio' name='sex' value='1' />男</label>
				<label><input type='radio' name='sex' value='2' checked=checked />女</label>
			</dd>
		</dl>
		<dl>
			<dt>出生日期：</dt>
			<dd>
				<input type="text" name="birthday" class="input_text Wdate" pattern='date' empty onFocus="WdatePicker()" />
			</dd>
		</dl>
		<dl>
			<dt>所在地区：</dt>
			<dd>
				<select class="input_select" name="province" child="city,area"></select>
				<select class="input_select" name="city" child="area"></select>
				<select class="input_select" name="area"></select>
			</dd>
		</dl>
		<dl>
			<dt>联系地址：</dt>
			<dd><input type='text' class='input_text' name='contact_addr' alt='请填写联系地址' /></dd>
		</dl>
		<dl>
			<dt>手机号码：</dt>
			<dd><input class="input_text" type="text" name='mobile' pattern='mobi' empty alt='请填写正确的手机号码' /></dd>
		</dl>
		<dl>
			<dt>邮箱：</dt>
			<dd>
				<input type='text' class='input_text' name='email' pattern='email' empty alt='请填写正确的邮箱地址' />
			</dd>
		</dl>
		<dl>
			<dt>邮编：</dt>
			<dd><input type='text' class='input_text' name='zip' pattern='zip' empty alt='请填写正确的邮政编码' /></dd>
		</dl>
		<dl>
			<dt>固定电话：</dt>
			<dd><input class="input_text" type="text" name='telephone' pattern='phone' empty alt='请填写正确的固定电话' /></dd>
		</dl>
		<dl>
			<dt>QQ：</dt>
			<dd><input class="input_text" type="text" name='qq' pattern='qq' empty alt='请填写正确的QQ号' /></dd>
		</dl>
		<dl>
			<dt></dt>
			<dd><input class="input_submit" type="submit" value="保存修改" /></dd>
		</dl>
	</form>
</section>
<script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/jqueryFileUpload/jquery.ui.widget.js"></script><script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/jqueryFileUpload/jquery.iframe-transport.js"></script><script type="text/javascript" charset="UTF-8" src="/iWebShop5.5/runtime/_systemjs/jqueryFileUpload/jquery.fileupload.js"></script>
<input style="display:none;" type="file" accept="image/png,image/gif,image/jpeg" id="userIcoFile" name="userIcoFile" data-url="<?php echo IUrl::creatUrl("/ucenter/user_ico_upload");?>" />

<script type='text/javascript'>
//jquery图片上传
$('#userIcoFile').fileupload({
    dataType: 'json',
    done: function (e, data)
    {
        data.result && data.result.flag == 1 ? $('#user_ico_img').attr('src',data.result.img) : alert(data.result.error);
    }
});

//表单回填
var areaInstance = new areaSelect('province');
<?php if($userData && $userData['area']){?>
<?php $area = explode(',',trim($userData['area'],','))?>
areaInstance.init({"province":"<?php echo isset($area[0])?$area[0]:"";?>","city":"<?php echo isset($area[1])?$area[1]:"";?>","area":"<?php echo isset($area[2])?$area[2]:"";?>"});
<?php }else{?>
areaInstance.init();
<?php }?>

var formObj = new Form('user_info');
formObj.init(<?php echo JSON::encode($userData);?>);
</script>

			</section>
			<!-- 个人中心内容-功能栏 -->
			<aside class="ucenter_bar">
				<!-- 我的商城 -->
				<div class="ucenter_bar_wapper">
					<a href="<?php echo IUrl::creatUrl("/ucenter/index");?>">我的商城</a>
				</div>
				<!-- 我的商城 -->
				<!-- 功能栏 -->
				<?php $index=0;?>
				<?php foreach($items=menuUcenter::init() as $key => $item){?>
				<?php $index++;?>
				<nav class="user_bar">
					<h3><?php echo isset($key)?$key:"";?></h3>
					<ul>
						<?php foreach($items=$item as $moreKey => $moreValue){?>
						<li><a title="<?php echo isset($moreValue)?$moreValue:"";?>" href="<?php echo IUrl::creatUrl("".$moreKey."");?>"><?php echo isset($moreValue)?$moreValue:"";?></a></li>
						<?php }?>
					</ul>
				</nav>
				<?php }?>
				<!-- 功能栏 -->
			</aside>
			<!-- 个人中心内容-功能栏 -->
		</div>
		<section class="ucenter_goods">
			<h3>也许你会对下列商品感兴趣</h3>
			<ul>
				<?php foreach($items=Api::run('getGoodsByCommendgoods',8) as $key => $item){?>
				<li>
					<a href="<?php echo IUrl::creatUrl("/site/products/id/".$item['id']."");?>">
						<img src="<?php echo IUrl::creatUrl("/pic/thumb/img/".$item['img']."/w/170/h/170");?>" alt="<?php echo isset($item['name'])?$item['name']:"";?>">
						<p class="pro_title"><?php echo isset($item['name'])?$item['name']:"";?></p>
						<p class="pro_price">￥<?php echo isset($item['sell_price'])?$item['sell_price']:"";?></p>
					</a>
				</li>
				<?php }?>
			</ul>
		</section>
	</section>
</div>
<!-- 个人中心内容 -->

<footer class="foot">
	<section class="service">
		<ul>
			<li class="item1">
				<i class="fa fa-star"></i>
				<strong>正品优选</strong>
			</li>
			<li class="item2">
				<i class="fa fa-globe"></i>
				<strong>上市公司</strong>
			</li>
			<li class="item3">
				<i class="fa fa-inbox"></i>
				<strong>300家连锁门店</strong>
			</li>
			<li class="item4">
				<i class="fa fa-map-marker"></i>
				<strong>上百家维修网点 全国联保</strong>
			</li>
		</ul>
	</section>
	<section class="help">
		<div class="prompt_link">
			<?php $catIco = array('help-new','help-delivery','help-pay','help-user','help-service')?>
			<?php foreach($items=Api::run('getHelpCategoryFoot') as $key => $helpCat){?>
			<dl class="help_<?php echo $key+1;?>">
				<dt>
					<p class="line"></p>
					<p class="title"><a href="<?php echo IUrl::creatUrl("/site/help_list/id/".$helpCat['id']."");?>"><?php echo isset($helpCat['name'])?$helpCat['name']:"";?></a></p>
				</dt>
				<?php foreach($items=Api::run('getHelpListByCatidAll',array('#cat_id#',$helpCat['id'])) as $key => $item){?>
				<dd><a href="<?php echo IUrl::creatUrl("/site/help/id/".$item['id']."");?>"><?php echo isset($item['name'])?$item['name']:"";?></a></dd>
				<?php }?>
			</dl>
			<?php }?>
		</div>
		<div class="contact">
			<p class="line"></p>
			<em>400-888-8888</em>
			<span>24小时在线客服(仅收市话费)</span>
			<a href="#"><i class="fa fa-comments"></i> 在线客服</a>
		</div>
	</section>
	<section class="copy">
		<?php echo IFilter::stripSlash($this->_siteConfig->site_footer_code);?>
	</section>
</footer>



<script>
//DOM加载完毕后运行
$(function(){
	//隔行换色
	$(".list_table tr:nth-child(even)").addClass('even');
	$(".list_table tr").hover(
		function () {
			$(this).addClass("sel");
		},
		function () {
			$(this).removeClass("sel");
		}
	);

	//按钮高亮
	var localUrl = "<?php echo IUrl::getUri();?>";
	$('a[href^="'+localUrl+'"]').parent().addClass('current');
});

</script>
</body>
</html>
