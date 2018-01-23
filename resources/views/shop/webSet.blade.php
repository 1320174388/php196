@extends('shop.header')

@section('title','控制台')

@section('shop',session('home_user_rest')->name)

@section('script')
	<script type="text/javascript" src="{{ url('/ad/bootstrap/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('/ad/bootstrap/js/bootstrap.js') }}"></script>
	<script type="text/javascript" src="{{ url('/ad/bootstrap/js/npm.js') }}"></script>
@stop

@section('css')
	<style type="text/css">
		.th{
			border:1px solid #ccc;
		}
		.td{
			border:1px solid #ccc;
		}
		.ddd{
			height:50px;
			line-height:50px;
		}
	</style>
@stop

@section('content')
	<div class="authority">
		<div class="authority-head">
			<div class="manage-head">
				<h6 class="layout padding-left manage-head-con">食品管理
					<b style="color:red">
						@if (count($errors) > 0)
					            @if(is_object($errors))
					              @foreach ($errors->all() as $error)
					                {{ $error }}
					              @endforeach
					            @else
					                {{ $errors }}
					            @endif
					    @endif
				    </b>
				</h6>
			</div>
		</div>
		<div class="authority-content">
			<div class="list-content show">
				<div class="offcial-table tr-border margin-big-top clearfix">
					<div class="tr-th clearfix">
						<div class="th w15">
							食品名称
						</div>
						<div class="th w30">
							食品分类
						</div>
						<div class="th w20">
							食品图片
						</div>
						<div class="th w15">
							食品价格
						</div>
						<div class="th w20">
							操作
						</div>
					</div>
					<div class="tr clearfix border-bottom-none">
					<form action="{{ url('shop/admin/dowebSet') }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="td w15">
							<input type="text" name="name" style="width:100%;height:38px;" value="{{ old('name') }}">
						</div>
						<div class="td w30">
							<select name="cate_id" id="" style="width:100%; height:40px;">
								@if($parent){
									@foreach($parent as $v)
										<option @if( $v->id == old('cate_id')) selected @endif value="{{ $v->id }}">{{ $v->name }}</option>
									@endforeach
								@endif
							</select>
						</div>
						<div class="td w20">
							<input type="file" class="button" name="avatar" style="width:100%; height:35px;">
						</div>
						<div class="td w15">
							<input type="text" name="price" style="width:100%;height:38px;" value="{{ old('price') }}">
						</div>
						<div class="td w20">
							<button class="button" style="width:100%;height:40px; color:blue;">添加</button>
						</div>
					</form>
					</div>
					@foreach($food as $v)
					<div class="tr clearfix border-bottom-none food_show">
					<form action="{{ url('shop/admin/webEdit/'.$v->id) }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type='hidden' name="id" value="{{ $v->id }}">
						<div class="td w15 ddd">
							<b style="display:block;" class="admin_none">{{ $v->name }}</b>
							<input type="text" name="name" style="width:100%;height:100%; display:none;" value="{{ $v->name }}" class="admin_edit">
						</div>
						<div class="td w30 ddd" style="text-align:left;">
							<b style="display:block;" class="admin_none">
								@foreach($parent as $s)
									@if( $s->id == $v->cate_id)
										{{ $s->name }}
									@endif
								@endforeach
							</b>
							<select name="cate_id" id="" style="width:100%; height:40px; display:none;" class="admin_edit">
								@if($parent){
									@foreach($parent as $s)
										<option @if( $s->id == $v->cate_id ) selected @endif value="{{ $s->id }}">{{ $s->name }}</option>
									@endforeach
								@endif
							</select>
						</div>
						<div class="td w20 ddd">
							<img src="{{ url('shopUploads/'.$v->img) }}" height="48" class="admin_none">
							<input type="file" class="button admin_edit" name="avatar" style="width:100%; height:100%; display:none;" class="admin_edit">
						</div>
						<div class="td w15 ddd">
							<b style="display:block;" class="admin_none">{{ $v->price }}</b>
							<input type="text" name="price" style="width:100%;height:100%; display:none;" value="{{ $v->price }}" class="admin_edit">
						</div>
						<div class="td w20 ddd">
							<a href=""><button class="button a_edit admin_none" style="width:49%;height:40px; color:blue;">编辑</button></a>
							<a href="{{ url('shop/admin/webDel/'.$v->id) }}"><button class="button a_del admin_none" style="width:49%;height:40px; color:red;">删除</button></a>
							<button class="button admin_edit" style="width:49%;height:40px; color:blue; display:none;">更新</button>
							<button class="button x_edit admin_edit" style="width:49%;height:40px; color:red; display:none;">取消</button>
						</div>
					</form>
					</div>
					@endforeach
				</div>
			</div>
			<div class="show-page padding-big-right">
				<div class="page">
					<div class="page">
						<ul class="offcial-page margin-top margin-big-right">
							<li>{!! $food->render() !!}</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.margin-big-right').find('a').addClass('next disable');
		});
		$('.a_edit').on('click',function(){
			$(this).parent().parent().parent().find('.admin_none').hide();
			$(this).parent().parent().parent().find('.admin_edit').show();
			return false;
		});
		$('.x_edit').on('click',function(){
			$(this).parent().parent().parent().find('.admin_none').show();
			$(this).parent().parent().parent().find('.admin_edit').hide();
			return false;
		});
		$('.a_del').on('click',function(){
			var dd = confirm('确定删除吗');
			return dd;
		});
	</script>
@stop