<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->_siteConfig->name;?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link type="image/x-icon" href="<?php echo IUrl::creatUrl("")."favicon.ico";?>" rel="icon">
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/jquery/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/form/form.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/autovalidate/validate.js?v=5.1"></script><link rel="stylesheet" type="text/css" href="/runtime/_systemjs/autovalidate/style.css" />
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artdialog/artDialog.js?v=4.8"></script><script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artdialog/plugins/iframeTools.js"></script><link rel="stylesheet" type="text/css" href="/runtime/_systemjs/artdialog/skins/black.css" />
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artTemplate/artTemplate.js"></script><script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artTemplate/artTemplate-plugin.js"></script>
	<!--[if IE]><script src="<?php echo $this->getWebViewPath()."javascript/html5.js";?>"></script><![endif]-->
	<script src='<?php echo $this->getWebViewPath()."javascript/site.js";?>'></script>
	<script type='text/javascript' src='<?php echo IUrl::creatUrl("")."public/javascript/public.js";?>'></script>
	<link rel="stylesheet" href="<?php echo $this->getWebSkinPath()."style/style.css";?>">
</head>
<body>
<!--

模版使用字体图标为优化过的 awesome 3.0 图标字体库

使用帮助见:http://www.bootcss.com/p/font-awesome/

 -->
<!-- 顶部工具栏 -->
<div class="header_top">
	<div class="web">
		<div class="welcome">
			欢迎您来到 <?php echo $this->_siteConfig->name;?>！
		</div>
		<ul class="top_tool">
			<li><?php plugin::trigger('siteTopMenu')?></li>
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

	<div class="nav_bar">
		<div class="home_nav_bar user_center">
		<!-- 导航栏 -->
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
					<?php foreach($items=Api::run('getCategoryListTop', 8) as $key => $first){?>
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
					<li class="user_nav_index home_nav_index"><a href="<?php echo IUrl::creatUrl("/site/index");?>"><span>首 页</span></a></li>
					<?php foreach($items=Api::run('getGuideList') as $key => $item){?>
					<li class="user_nav_index home_nav_index"><a href="<?php echo IUrl::creatUrl("".$item['link']."");?>"><span><?php echo isset($item['name'])?$item['name']:"";?></span></a></li>
					<?php }?>
				</ul>
			</div>
		</div>
		</div>
	</div>
</header>

<!--主要模板内容 开始-->
<div class="home_content">
	<section class="web">
	<header class="login_header">
		<h3>用户注册</h3>
		<div class="go_login">
			已有<?php echo $this->_siteConfig->name;?>帐号？请点 <a href="<?php echo IUrl::creatUrl("/simple/login");?>">这里登录</a>
		</div>
		<p>欢迎来到我们的网站，如果您是新用户，请填写下面的表单进行注册</p>
	</header>
	<section class="reg_box">
		<form action='<?php echo IUrl::creatUrl("/user/regTelInfo");?>' method='post'>
		<?php if($this->username){?>
		<tr><th>邀请人:</th><td><?php echo $this->username;?> <input type="hidden" name='userid' value="<?php echo $this->userid;?>"></td></tr>
		<?php }?>
		<dl>
				<dt>用户名：</dt>
				<dd>
					<input class="input_text" name='username' id="username" type="text" pattern="^[\w\u0391-\uFFE5]{2,20}$" alt="填写2-20个字符，可以为字母、数字、下划线和中文">
					<span>请填写用户名，格式为2-20个字符，可以为字母、数字、下划线和中文</span>
				</dd>
			</dl>
			<dl>
				<dt>手机号：</dt>
				<dd>
					<input class="input_text" type="text" name='mobile' id="tel" pattern="mobi" alt="填写正确的手机格式">
					<span>填写正确的手机格式</span>
				</dd>
			</dl>
			<dl>
				<dt>设置密码：</dt>
				<dd>
					<input class="input_text" type="password" name='password' pattern="^\S{6,32}$" bind='repassword' alt='填写6-32个字符'>
					<span>填写登录密码，6-32个字符</span>
				</dd>
			</dl>
			<dl>
				<dt>手机验证：</dt>
				<dd>
					<input class='input_text w100' type='text' name='mobile_code' alt="" pattern='^\w{4,6}$'>
					<input class="input_button" id="sendreg" type="button" value="获取验证码">
				</dd>
			</dl>
			
			<dl>
				<dt></dt>
				<dd><input class="input_submit" type="submit" value="现在注册" /></dd>
			</dl>
		</form>
	</section>
</section>
<script>
formname=false;
formtel=false;
	$('#sendreg').click(function(){
		tel=$('#tel').val();
		reg=/^1[3,5,8]\d{9}$/;

		if (!tel.match(reg)) {
			alert('请输入正确的手机号');
		} else {
			
		$.ajax({
			type:'post',
			url:"<?php echo IUrl::creatUrl("/user/sendreg");?>",
			data:{tel:tel},
			success:function(reg){
				
			}
		})
		}
		
	})

	$('#username').blur(function(){
		name=$(this).val();
		$.ajax({
			type:'post',
			url:"<?php echo IUrl::creatUrl("/user/verifyname");?>",
			data:{name:name},
			dataType:'json',
			success:function(res){
				if (res.code==0) {
					$('#fontred').remove();
					$('#username').after('<font id="fontred" color=red>用户名已存在</font>');
							formname=false;
					
				} else {
					$('#fontred').remove();
					formname=true;
				}

				$('form').submit(function(){

					if (formname && formtel){
						return true;
					} else {
						return false;
						}
					})
					
			}
		})
	})


	$('#tel').blur(function(){

		tel=$(this).val();
		tel=$('#tel').val();
		reg=/^1[3,5,8]\d{9}$/;

		if (!tel.match(reg)) {
			alert('请输入正确的手机号');
		} else {
		$.ajax({
			type:'post',
			url:"<?php echo IUrl::creatUrl("/user/verifytel");?>",
			data:{tel:tel},
			dataType:'json',
			success:function(res){
				if (res.code==0) {
					$('#redtel').remove();
					$('#tel').after('<font id="redtel" color=red>手机号已存在</font>');
					$("#sendreg").css('background','#C0C0C0');
					$("#sendreg").attr('',true);
							formtel=false;
					
				} else {
					$('#redtel').remove();
					$("#sendreg").css('background','#2d64b3');
					
					formtel=true;
				}

				$('form').submit(function(){

					if (formname && formtel){
						return true;
					} else {
						return false;
						}
					})
			}
		})
	}
	})
</script>

</div>
<!--主要模板内容 结束-->

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

</body>
</html>
<script>
//当首页时显示分类
<?php if(IWeb::$app->getController()->getId() == 'site' && IWeb::$app->getController()->getAction()->getId() == 'index'){?>
$('.cat_list').removeClass('none');
<?php }?>

$(function(){
	$('input:text[name="word"]').val("<?php echo $this->word;?>");
});
</script>
