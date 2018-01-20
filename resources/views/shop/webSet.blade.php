@extends('shop.header')

@section('title','控制台')

@section('shop',session('home_user_rest')->name)

@section('content')
	<div class="authority">
		<div class="authority-head">
			<div class="manage-head">
				<h6 class="layout padding-left manage-head-con">站点管理
				<span class="fr text-small text-normal padding-top">发布时间：2016-07-08</span>
				<span class="fr margin-large-right padding-top text-small text-normal">最新版本：<em class="text-main">2.4.0.160708</em></span>
				</h6>
			</div>
		</div>
		<div class="authority-content">
			<div class="list-content show">
				<div class="offcial-table tr-border margin-big-top clearfix">
					<div class="tr-th clearfix">
						<div class="th w20">
							分类编号
						</div>
						<div class="th w60">
							分类名称
						</div>
						<div class="th w20">
							操作
						</div>
					</div>
					<div class="tr clearfix border-bottom-none">
						<div class="td w20">
							1
						</div>
						<div class="td w60" style="text-align:left;">
							localhost
						</div>
						<div class="td w20">
							<a href="#" >删除</a>
						</div>
					</div>
				</div>
			</div>
			<div class="show-page padding-big-right">
				<div class="page">
					<div class="page">
						<ul class="offcial-page margin-top margin-big-right">
							<li>共<em class="margin-small-left margin-small-right">1</em>条数据</li>
							<li>每页显示<em class="margin-small-left margin-small-right">15</em>条</li>
							<li><a class="next disable">上一页</a></li>
							<li></li>
							<li><a class="next disable">下一页</a></li>
							<li><span class="fl">共<em class="margin-small-left margin-small-right">1</em>页</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')

@stop