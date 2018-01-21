@extends('shop.header')

@section('title','控制台')

@section('shop',session('home_user_rest')->name)

@section('css')
	<style type="text/css">
		.th{
			border:1px solid #ccc;
		}
		.td{
			border:1px solid #ccc;
		}
	</style>
@stop

@section('content')
	<div class="authority">
		<div class="authority-head">
			<div class="manage-head">
				<h6 class="layout padding-left manage-head-con">食品管理</h6>
			</div>
		</div>
		<div class="authority-content">
			<div class="list-content show">
				<div class="offcial-table tr-border margin-big-top clearfix">
					<div class="tr-th clearfix">
						<div class="th w10">
							食品名称
						</div>
						<div class="th w30">
							食品分类
						</div>
						<div class="th w10">
							食品价格
						</div>
						<div class="th w10">
							食品图片
						</div>
						<div class="th w10">
							食品库存
						</div>
						<div class="th w10">
							食品销量
						</div>
						<div class="th w20">
							操作
						</div>
					</div>
					<div class="tr clearfix border-bottom-none">
					<form action="{{ url('shop/admin/dowebSet') }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="td w10">
							<input type="text" name="name" style="width:100%;height:38px;">
						</div>
						<div class="td w30">
							<select name="cate_id" id="" style="width:100%; height:40px;"></select>
						</div>
						<div class="td w10">
							<input type="text" name="price" style="width:100%;height:38px;">
						</div>
						<div class="td w10">
							<input type="file" class="button" name="price" style="width:100%; height:35px;">
						</div>
						<div class="td w10">
							<input type="text" name="stock" style="width:100%;height:38px;">
						</div>
						<div class="td w10">
							<input type="text" name="sales" style="width:100%;height:38px;">
						</div>
						<div class="td w20">
							<button class="button" style="width:49%;height:40px; color:blue;">添加</button>
							<button class="button" style="width:49%;height:40px; color:red;">删除</button>
						</div>
					</form>
					</div>
					<div class="tr-td clearfix">
						<div class="td w10">
							食品名称
						</div>
						<div class="td w30">
							食品分类
						</div>
						<div class="td w10">
							食品价格
						</div>
						<div class="td w10">
							食品图片
						</div>
						<div class="td w10">
							食品库存
						</div>
						<div class="td w10">
							食品销量
						</div>
						<div class="td w20">
							操作
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