@extends('shop.header')

@section('title','控制台')

@section('shop',session('home_user_rest')->name)

@section('content')
	<div class="indentify clearfix">
		<div class="manage-head">
			<h6 class="padding-left manage-head-con text-sub">个人认证勋章</h6>
		</div>
		<div class="indentify-class padding-lr clearfix" style="position:relative; left:350px; top:50px;">
			<ul class="class-content clearfix">
				<li class="fl margin-large-35">
				<a class="class-detail fl " >
				<div class="class-detail-top" style='border:1px solid #45f;'>
					<div class="text-center indentify-icon">
						<img src="/Tpshop/Images/identify_personal.png">
					</div>
					<h3 class="text-center">个人认证</h3>
					<p class="margin-tb padding-bottom text-justify info">
						由个人或个体经营户认证，认证通过可获得店铺管理权限
					</p>
					<ul class="class-detail-has margin-top text-lh-big">
						<li>
						<span class="text-black-gray">管理店铺</span>
						<span class="fr text-gray-white"><b>√</b></span>
						</li>
						<li>
						<span class="text-black-gray">管理菜品</span>
						<span class="fr text-gray-white"><b>√</b></span>
						</li>
						<li>
						<span class="text-black-gray">管理订单</span>
						<span class="fr text-gray-white"><b>√</b></span>
						</li>
						<li>
						<span class="text-black-gray">收支查看</span>
						<span class="fr text-gray-white"><b>√</b></span>
						</li>
					</ul>
				</div>
				<p class="continue text-big">
					个人认证勋章
				</p>
				</a>
				</li>
			</ul>
		</div>
	</div>
@stop

@section('js')

@stop