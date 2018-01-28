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
		.input_shop{
			height:40px;
			width:100%;
		}
	</style>
@stop

@section('content')
	<div class="info-center">
        <div class="manage-head">
            <h6 class="padding-left manage-head-con">订单管理</h6>
        </div>
        <div class="manage-head">
			<div class="offcial-table tr-border margin-big-top clearfix hhh">
			<form action="{{ url('shop/admin/order_show') }}" method="get">
				<div style="color:black;" class="td w15">
					<b>订单编号 : </b>
				</div>
				<div style="color:black;" class="td w15">
					<input type="text" name="order_number" class="input_shop">
				</div>
				<div style="color:black;" class="td w10">
					<b>买家名称 : </b>
				</div>
				<div style="color:black;" class="td w15">
					<input type="text" name="name" class="input_shop">
				</div>
				<div style="color:black;" class="td w10">
					<b>提交时间 : </b>
				</div>
				<div style="color:black;" class="td w15">
					<input type="text" name="order_time" class="input_shop">
				</div>
				<div style="color:black;" class="td w20">
					<button href="{{ url('shop/admin/webSet') }}" style="margin:0 auto; padding:0; background-color:#1e82d4; color:black; width:90%; height:30px;">点击搜索</button>
				</div>
			</form>
			</div>
		</div>
        <div class="offcial-table input-table table-margin clearfix">
            <div class="tr-th clearfix">
                <div class="th w15 text-center">订单编号</div>
                <div class="th w10 text-center">订单状态</div>
                <div class="th w10 text-center">买家名称</div>
                <div class="th w10 text-center">订单金额</div>
                <div class="th w20 text-center">地址信息</div>
                <div class="th w15 text-center">提交时间</div>
                <div class="th w20 text-center">操作</div>
            </div>
	        @if(!empty($order[0]))
	        	@foreach($order as $k=>$v)
		            <div class="tr-td clearfix">
		                <div class="td w15 text-center">{{ $v->order_number }}</div>
		                <div class="td w10 text-center">
							@if($v->status == 2)
								<span style="color:blue;">以完成</span>
							@endif
		                </div>
                		<div class="td w10 text-center">{{ $v->name }}</div>
		                <div class="td w10 text-center">{{ $v->price }}</div>
		                <div class="td w20 text-center">{{ $v->address }}</div>
		                <div class="td w15 text-center">{{ $v->order_time }}</div>
		                <div class="td w20 text-center">
		                	<a href="javascript:;">
		                		<button order="{{ $v->order_number }}" class="button order_details" style="width:99%; color:blue;">订单详情</button>
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
    <div class="show-page padding-big-right">
		<div class="page">
			<div class="page">
				<ul class="offcial-page margin-top margin-big-right">
					<li>{!! $order->appends($where)->render() !!}</li>
				</ul>
			</div>
		</div>
	</div>
@stop

@section('js')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.margin-big-right').find('a').addClass('next disable');
		});
		var s = 0;
		$('.order_details').on('click',function(){
			if(s == 0){
				s++;
				var order = $(this).attr('order');
				$.ajax({
					url:"{{ url('shop/admin/order_detail') }}",
					type:'post',
					data:{'order_number':order,'_token':"{{ csrf_token() }}"},
					success:function(data){
						var str = '<table border="1" style="margin:auto auto" cellpadding="10" cellspacing="0">';
						str += '<tr><th>食品名称</th><th>食品数量</th><th>食品价格</th></tr>';
						$.each(data,function(i,n){
							str += '<tr><td>'+n.name+'</td><td>'+n.food_num+'</td><td>'+n.price+'</td></tr>';
						});
						str += '</table>';
						//页面层
						layer.open({
						  type: 1,
						  skin: 'layui-layer-rim', //加上边框
						  area: ['420px', '240px'], //宽高
						  content: str
						});
						s = 0;
					},
					dataType:'json'
				});
			}
		});
	</script>
@stop