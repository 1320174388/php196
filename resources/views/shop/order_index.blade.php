@extends('shop.header')

@section('title','控制台')

@section('shop',session('home_user_rest')->name)

@section('script')
	<script type="text/javascript" src="/layer/layer.js"></script>
@stop

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
	<div class="info-center">
        <div class="manage-head">
            <h6 class="padding-left manage-head-con">订单管理</h6>
        </div>
        <div class="offcial-table input-table table-margin clearfix">
            <div class="tr-th clearfix">
                <div class="th w20 text-center">订单号</div>
                <div class="th w20 text-center">提交时间</div>
                <div class="th w10 text-center">订单金额</div>
                <div class="th w10 text-center">订单状态</div>
                <div class="th w20 text-center">地址信息</div>
                <div class="th w20 text-center">操作</div>
            </div>
	        @if($order)
	        	@foreach($order as $k=>$v)
		            <div class="tr-td clearfix">
		                <div class="td w20 text-center">{{ $v->order_number }}</div>
		                <div class="td w20 text-center">{{ $v->order_time }}</div>
		                <div class="td w10 text-center">{{ $v->price }}</div>
		                <div class="td w10 text-center">
							@if($v->status == 0)
							<b style="color:green;">新订单</b>
							@endif
		                </div>
		                <div class="td w20 text-center">{{ $v->address }}</div>
		                <div class="td w20 text-center">
		                	<a href="javaScript:;">
		                		<button id="button_del" order="{{ $v->order_number }}" class="button order_details" style="width:49%; color:blue;">订单详情</button>
		                	</a>
		                	<a href="">
		                		<button id="button_del" class="button" style="width:49%; color:green;">处理订单</button>
		                	</a>
		                </div>
		            </div>
		        @endforeach
			@else
	            <div class="tr non-info show border-bottom-none">
	            	<span>没查询到符合条件的记录</span>
	            </div>
			@endif
        </div>
    </div>
    <div class="show-page padding-big-right hidden">
		<div class="page">
		</div>
    </div>
@stop

@section('js')
	<script type="text/javascript">
		$('.order_details').on('click',function(){
			var order = $(this).attr('order');
			$.ajax({
				url:"{{ url('shop/admin/order_detail') }}",
				type:'post',
				data:{'order_number':order,'_token':"{{ csrf_token() }}"},
				success:function(data){
					//页面层
					layer.open({
					  type: 1,
					  skin: 'layui-layer-rim', //加上边框
					  area: ['420px', '240px'], //宽高
					  content: data
					});
				},
				dataType:'json'
			});
		});
	</script>
@stop