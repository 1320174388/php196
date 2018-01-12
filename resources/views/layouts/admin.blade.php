<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>@yield('title')</title>
	
    <link rel="stylesheet" href="/admin/css/base.css">
    <link rel="stylesheet" href="/admin/css/style.css">

</head>
<body>

	{{--在父模板中定义子模板需要实现的部分的占位符--}}
    	@section('content')
    	@show

</body>
</html>