@extends('shop.header')

@section('title','控制台')

@section('shop',session('home_user_rest')->name)

@section('script')
	<script type="text/javascript" src="{{ url('/ad/bootstrap/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('/ad/bootstrap/js/bootstrap.js') }}"></script>
	<script type="text/javascript" src="{{ url('/ad/bootstrap/js/npm.js') }}"></script>
@stop

@section('css')
	<link type="text/css" rel="stylesheet" href="{{ url('/ad/bootstrap/css/bootstrap.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ url('/ad/bootstrap/css/bootstrap.min.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ url('/ad/bootstrap/css/bootstrap-theme.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ url('/ad/bootstrap/css/bootstrap-theme.min.css') }}">
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
						<div class="td w10">
							<input type="text" name="price" style="width:100%;height:38px;" value="{{ old('price') }}">
						</div>
						<div class="td w10">
							<input type="file" class="button" name="avatar" style="width:100%; height:35px;">
						</div>
						<div class="td w10">
							<input type="text" name="stock" style="width:100%;height:38px;" value="{{ old('stock') }}">
						</div>
						<div class="td w10">
							0
						</div>
						<div class="td w20">
							<button class="button" style="width:100%;height:40px; color:blue;">添加</button>
						</div>
					</form>
					</div>
					@foreach($food as $v)
					<div class="tr clearfix border-bottom-none">
						<div class="td w10 ddd">
							{{ $v->name }}
						</div>
						<div class="td w30 ddd" style="text-align:left;">
							@foreach($parent as $s)
								@if( $s->id == $v->cate_id)
									{{ $s->name }}
								@endif
							@endforeach
						</div>
						<div class="td w10 ddd">0
							{{ $v->price }}
						</div>
						<div class="td w10 ddd">
							<img src="{{ url('shopUploads/'.$v->img) }}" height="48">
						</div>
						<div class="td w10 ddd">
							{{ $v->stock }}
						</div>
						<div class="td w10 ddd">
							{{ $v->sales }}
						</div>
						<div class="td w20 ddd">
							<a href="{{ url('shop/admin/webEdit/'.$v->id) }}"><button class="button a_edit" style="width:49%;height:40px; color:blue;">编辑</button></a>
							<a href="{{ url('shop/admin/webDel/'.$v->id) }}"><button class="button a_del" style="width:49%;height:40px; color:red;">删除</button></a>
						</div>
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
		$('.a_edit').on('click',function(){
			
		});
		$('.a_del').on('click',function(){
			var dd = confirm('确定删除吗');
			return dd;
		});
	</script>
@stop