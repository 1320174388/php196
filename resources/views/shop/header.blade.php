<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>餐店 - 管理 - @yield('title')</title>
		<link rel="stylesheet" type="text/css" href="/Tpshop/Css/identify.css" />
		<link rel="stylesheet" type="text/css" href="/Tpshop/Css/layout.css" />
		<link rel="stylesheet" type="text/css" href="/Tpshop/Css/account.css" />
		<link rel="stylesheet" type="text/css" href="/Tpshop/Css/style.css" />
		<link rel="stylesheet" type="text/css" href="/Tpshop/Css/control_index.css" />
		<script type="text/javascript" src="/Tpshop/Js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="/Tpshop/Js/haidao.offcial.general.js"></script>
		<script type="text/javascript" src="/Tpshop/Js/select.js"></script>
		<script type="text/javascript" src="/Tpshop/Js/haidao.validate.js"></script>

		@section('script')
			
		@show
		@section('css')

		@show
	</head>

	<body>
		<div class="view-topbar">
			<div class="topbar-console">
				<div class="tobar-head fl">
					<a href="#" class="topbar-logo fl">
					<span><img src="/Tpshop/Images/logo.png" width="20" height="20"/></span>
					</a>
					<a href="{{ url('shop/admin') }}" class="topbar-home-link topbar-btn text-center fl"><span>@yield('shop')</span></a>
				</div>
			</div>
			<div class="topbar-info">
				<ul class="fr">
					<li class="fl topbar-info-item">
					<div class="dropdown">
						<a href="#" class="topbar-btn">
						<span class="fl text-normal">{{ session('home_user')->name }}</span>
						<span class="icon-arrow-down"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="{{ url('home/personal') }}">个人中心</a></li>
							<li><a href="{{ url('shop/admin/user') }}">个人信息</a></li>
							<li><a href="{{ url('logout') }}">退出账号</a></li>
						</ul>
					</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="view-body">
			<div class="view-sidebar">
				<div class="sidebar-content">
					<div class="sidebar-nav">
						<div class="sidebar-title">
							<a>
								<span class="icon"><b class="fl icon-arrow-down"></b></span>
								<span class="text-normal">用户中心</span>
							</a>
						</div>
						<ul class="sidebar-trans">
							<li>
								<a href="{{ url('shop/admin/user') }}">
									<b class="sidebar-icon"><img src="/Tpshop/Images/icon_cost.png" width="16" height="16" /></b>
									<span class="text-normal">账号管理</span>
								</a>
							</li>
							<li>
								<a href="{{ url('shop/admin/ident') }}">
									<b class="sidebar-icon"><img src="/Tpshop/Images/icon_authentication.png" width="16" height="16" /></b>
									<span class="text-normal">实名认证</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="sidebar-nav">
						<div class="sidebar-title">
							<a>
								<span class="icon"><b class="fl icon-arrow-down"></b></span>
								<span class="text-normal">餐店管理</span>
							</a>
						</div>
						<ul class="sidebar-trans">
							<li>
								<a href="{{ url('shop/admin/addInfo') }}">
									<b class="sidebar-icon"><img src="/Tpshop/Images/icon_market.png" width="16" height="16" /></b>
									<span class="text-normal">添加分类</span>
								</a>
							</li>
							<li>
								<a href="{{ url('shop/admin/webSet') }}">
									<b class="sidebar-icon"><img src="/Tpshop/Images/icon_author.png" width="16" height="16" /></b>
									<span class="text-normal">食品列表</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="sidebar-nav">
						<div class="sidebar-title">
							<a>
								<span class="icon"><b class="fl icon-arrow-down"></b></span>
								<span class="text-normal">订单管理</span>
							</a>
						</div>
						<ul class="sidebar-trans">
							<li>
								<a href="{{ url('shop/admin/order_index') }}">
									<b class="sidebar-icon"><img src="/Tpshop/Images/icon_order.png" width="16" height="16" /></b>
									<span class="text-normal">支付订单</span>
								</a>
							</li>
							<li>
								<a href="{{ url('shop/admin/order_handle') }}">
									<b class="sidebar-icon"><img src="/Tpshop/Images/icon_order.png" width="16" height="16" /></b>
									<span class="text-normal">处理订单</span>
								</a>
							</li>
							<li>
								<a href="{{ url('shop/admin/order_show') }}">
									<b class="sidebar-icon"><img src="/Tpshop/Images/icon_order.png" width="16" height="16" /></b>
									<span class="text-normal">完成订单</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="view-product background-color">
				@section('content')

				@show
			</div>
		</div>

		@section('js')

		@show

		<script>
			$(".sidebar-title").live('click', function() {
				if ($(this).parent(".sidebar-nav").hasClass("sidebar-nav-fold")) {
					$(this).next().slideDown(200);
					$(this).parent(".sidebar-nav").removeClass("sidebar-nav-fold");
				} else {
					$(this).next().slideUp(200);
					$(this).parent(".sidebar-nav").addClass("sidebar-nav-fold");
				}
			});
		</script>
	</body>

</html>