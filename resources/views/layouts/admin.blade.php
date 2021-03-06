<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/admin/themes/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/admin/themes/css/home.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ url('/admin/favicon.ico') }}">
    <link rel="stylesheet" href="/ad/bootstrap/css/bootstrap.min.css">
    <link href="{{ url('/bs/css/bootstrap.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('admin/style/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/style/js/ch-ui.admin.js') }}"></script>
    <script type="text/javascript" src="{{ asset('layer/layer.js') }}"></script>
    <script type="text/javascript" src="{{ url('/admin/themes/js/jquery-3.2.1.min.js') }}"></script>
</head>
<body>
    <header id="finance-header">
    <div class="finance-header">
        <div class="finance-header-content clearfix">
            <div class="finance-header-content-fl">
                <font size="5"><a style="color: white;"href="/">Fc_Kc后台管理</a></font>
            </div>
            <div class="finance-header-content-fr clearfix">
                <div class="finance-header-user">
                    <span>
                        <img src="/uploads/{{ session('admin_user')->avatar }}" />
                    </span>
                    <em><b><big>管理员：<a href="{{ url('admin/usershow/glyuser') }}/{{ session('admin_user')->name }}">{{ session('admin_user')->name }}</a></big></b></em>
                </div>
                <a href="{{ url('admin/logout') }}"><b><big>退出</big></b></a>
            </div>
        </div>
    </div>
</header>

    <div class="finance-content clearfix">
        <div class="finance-content-nav menu">
            <div class="menuParent">
                <div class="ListTitlePanel" style="background-color: #1e82d4;">
                    <h3 class="ListTitle">用户管理</h3>
                </div>
                <div class="menuList">
                    <a href="{{ url('admin/user') }}">管理员管理</a>
                    <a href="{{ url('admin/user/create') }}">添加管理员</a>
                    <a href="{{ url('admin/usershow/show') }}">普通用户管理</a>
                </div>
            </div>
            <div class="menuParent">
                <div class="ListTitlePanel">
                    <h3 class="ListTitle">店铺管理</h3>
                </div>
                <div class="menuList">
                    <a href="{{ url('/admin/shop') }}">店铺列表</a>
                </div>
            </div>
            <div class="menuParent">
                <div class="ListTitlePanel">
                    <h3 class="ListTitle">角色管理</h3>
                </div>
                <div class="menuList">
                    <a href="{{ url('admin/role/create') }}">添加角色</a>
                    <a href="{{ url('admin/role') }}">角色列表</a>
                </div>
            </div>
        </div>
	{{--在父模板中定义子模板需要实现的部分的占位符--}}
    	@section('content')

    	@show



<script type="text/javascript">
    $(document).ready(function() {
        var menuParent = $('.menu > .ListTitlePanel > div');//menu div
        var menuList = $('.menuList');
        $('.menu > .menuParent > .ListTitlePanel > .ListTitle').each(function(i) { //list
            $(this).click(function(){
                if($(menuList[i]).css('display') == 'none'){
                    $(menuList[i]).slideDown(300);
                }
                else{
                    $(menuList[i]).slideUp(300);
                }
            });
        });
    });
</script>
<script src="{{ url('/bs/js/jquery.min.js') }}"></script>
<script src="{{ url('/bs/js/bootstrap.min.js') }}"></script>
<script type="text/javascript">
$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
</script>
@section('js')

@show

</body>
</html>
