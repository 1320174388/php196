<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/admin/themes/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/admin/themes/css/home.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ url('/admin/favicon.ico') }}">
</head>
<body>
    <header id="finance-header">
    <div class="finance-header">
        <div class="finance-header-content clearfix">
            <div class="finance-header-content-fl">
                <h1>Fc_Kc后台管理</h1>
            </div>
            <div class="finance-header-content-fr clearfix">
                <div class="finance-header-user">
                    <em><b><big>管理员：{{ session('user')->name }}</big></b></em>
                </div>
                <a href="{{ url('admin/logout') }}"><b><big>退出</big></b></a>
            </div>
        </div>
    </div>
</header>

<section id="finance-content">
    <div class="finance-content clearfix">
        <div class="finance-content-nav menu">
            <div class="menuParent">
                <div class="ListTitlePanel">
                    <h3 class="ListTitle">用户管理</h3>
                </div>
                <div class="menuList">
                    <a href="{{ url('admin/user') }}">管理员管理</a>
                    <a href="{{ url('admin/user/create') }}">添加管理员</a>
                    <a href="#">普通用户管理</a>
                </div>
            </div>
            <div class="menuParent">
                <div class="ListTitlePanel">
                    <h3 class="ListTitle">代理商管理</h3>
                </div>
                <div class="menuList">
                    <a href="#">角色管理</a>
                    <a href="#">员工管理</a>
                    <a href="#">业务流程配置</a>
                    <a href="#">金融机构管理</a>
                    <a href="#">金融产品管理</a>
                </div>
            </div>
            <div class="menuParent">
                <div class="ListTitlePanel">
                    <h3 class="ListTitle">订单管理</h3>
                </div>
                <div class="menuList">
                    <a href="#">房抵贷订单管理</a>
                    <a href="#">企业贷订单管理</a>
                    <a href="#">信用贷订单管理</a>
                    <a href="#">退单管理</a>
                    <a href="#">订单移交记录</a>
                </div>
            </div>
            <div class="menuParent">
                <div class="ListTitlePanel">
                    <h3 class="ListTitle">客户管理</h3>
                </div>
                <div class="menuList">
                    <a href="#">客户列表</a>
                    <a href="#">待分配客户管理</a>
                    <a href="#">自由经纪人审核</a>
                </div>
            </div>
            <div class="menuParent">
                <div class="ListTitlePanel">
                    <h3 class="ListTitle">绩效查询</h3>
                </div>
                <div class="menuList">
                    <a href="#">绩效查询</a>
                    <a href="#">绩效查询</a>
                </div>
            </div>
            <div class="menuParent">
                <div class="ListTitlePanel">
                    <h3 class="ListTitle">轮播图管理</h3>
                </div>
                <div class="menuList">
                    <a href="#">轮播图管理</a>
                    <a href="#">轮播图管理</a>
                    <a href="#">轮播图管理</a>
                </div>
            </div>
        </div>
	{{--在父模板中定义子模板需要实现的部分的占位符--}}
    	@section('content')
    	@show
</section>
</body>
</html>