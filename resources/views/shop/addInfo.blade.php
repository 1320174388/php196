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
				<h6 class="layout padding-left manage-head-con">分类管理
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
						<div class="th w20">
							分类列表
						</div>
						<div class="th w20">
							输入内容
						</div>
						<div class="th w60">
							操作
						</div>
					</div>
					<div class="tr clearfix border-bottom-none">
					<form id="form_btn" action="{{ url('shop/admin/doaddInfo') }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="hidden" name="user_id" value="{{ session('home_user')->id }}">
						<div class="td w20">
							<select name="pid" id="select" style="width:100%; height:40px;">
							@if($parent){
								@foreach($parent as $v)
									<option value="{{ $v->id }}">{{ $v->name }}</option>
								@endforeach
							@endif
							</select>
						</div>
						<div class="td w20">
							<input type="text" name="name" style="width:100%; height:38px;">
						</div>
						<div class="td w20">
							<button id="button_add" class="button" style="width:100%;height:35px; color:blue;">添加</button>
						</div>
						<div class="td w20">
							<button id="button_edit" class="button" style="width:100%;height:35px; color:green;">修改</button>
						</div>
						<div class="td w20">
							<button id="button_del" class="button" style="width:100%;height:35px; color:red;">删除</button>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')
	<script type="text/javascript">
		$('#button_add').on('click',function(){
			$('#form_btn').append('<input type="hidden" name="add" value="1" />');
		});
		$('#button_edit').on('click',function(){
			$('#form_btn').append('<input type="hidden" name="edit" value="1" />');
		});
		$('#button_del').on('click',function(){
			$('#form_btn').append('<input type="hidden" name="del" value="1" />');
		});
		@if(session('shop_error_0'))
			alert('默认分类不可修改');
		@endif
		@if(session('shop_error_1'))
			alert('默认分类不可删除');
		@endif
		@if(session('shop_error_2'))
			alert('这个分类下有子级分类不可删除');
		@endif
		@if(session('shop_error_3'))
			alert('这个分类下有食品不可删除');
		@endif
	</script>
@stop