@extends('layouts.admin')
@section('title','店铺列表')
@section('content')

	<div class="finance-content-middle">
			<div class="finance-content-middle-title">
				<h4>店铺列表</h4>
			</div>
				<center>
			<div>
			<form id="frm" action="shop" method="get" class="form-inline">
				<div class="form-group">
					<label for="exampleInputName2">每页显示</label>
					<select name="num" class="form-control">
					  <option
						@if($where['num']==5)
                    		selected
                    	@endif
					  >5</option>
					  <option
						@if($where['num']==10)
                    		selected
                    	@endif
					  >10</option>
					  <option
						@if($where['num']==25)
                    		selected
                    	@endif
					  >25</option>
					  <option
						@if($where['num']==50)
                    		selected
                    	@endif
					  >50</option>
					  <option
						@if($where['num']==100)
                    		selected
                    	@endif
					  >100</option>
					</select>
				</div>
				 <div class="form-group">
				    <label for="exampleInputName2">店铺名称</label>
				    <input type="text" name="name" class="form-control" id="exampleInputName2" value="{{ $where['name'] }}">
				  </div>
				  <div class="form-group">
					<label for="exampleInputName2">店铺状态</label>
					<select id="select"  class="form-control">
					  <option value=""
					  	@if($where['status']=="")
                    		selected
                    	@endif
                    	>全部</option>
					  <option value="0"
						@if($where['status']==="0")
                    		selected
                    	@endif
					  >禁用</option>
					  <option value="1"
						@if($where['status']==1)
                    		selected
                    	@endif
					  >等待审核</option>
					  <option value="2"
						@if($where['status']==2)
                    		selected
                    	@endif
					  >已有店铺</option>
					</select>
				</div>
				  <button id="btn" type="submit" class="btn btn-default">查询</button>
			</form>
			</div>

				  </center>
			<div class="finance-content-middle-form">
				<div class="finance-add-agent finance-add-agent-color">
					<table>
						<tbody>
							<tr>
								<th>ID</th>
								<th>店铺名称</th>
								<th>店主名</th>
								<th>所在城市</th>
								<th>店铺状态</th>
								<th>操作</th>
							</tr>

						@foreach($shop as $k=>$v)
							<tr>
								<td class="name">{{ $v->user_id }}</td>
								<td>{{ $v->name }}</td>
								<td>{{ $v->user_name }}</td>
								<td>{{ $v->address }}</td>
								<td>
									@if ( $v->status == 0 )
									   禁用
									@elseif ( $v->status == 1 )
									   等待审核
									@elseif($v->status == 2)
									   已有店铺
									@endif
								</td>
								<td><a class="xq btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">查看详情</a> | 
								@if($v->status == 0) 
									<a class="gl btn btn-primary btn-xs">解封 </a>
								@elseif($v->status == 2) 
								 	<a class="gl btn btn-primary btn-xs">禁用</a> 
								@elseif($v->status == 1)
									<a class="gl btn btn-primary btn-xs">通过审核</a> |
									<a class="sh btn btn-primary btn-xs">审核失败</a></td>
								@endif
								
							</tr>
						@endforeach
						</tbody>
					</table>
					{!! $shop->appends($where)->render() !!}
				</div>
					<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
					  <div class="modal-dialog modal-lg" role="document">
					    <div class="modal-content">
					    	  <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">店铺详情</h4>
						      </div>
					   				<form class="form-horizontal">
									  <div class="form-group">
									    <label for="inputEmail3" class="col-sm-2 control-label">店铺名称</label>
									    <div class="col-sm-8">
									      <input type="text" readonly class="form-control inp" id="inputEmail3">
									    </div>
									    <div class="col-sm-2">
									    </div>
									  </div>
									  <div class="form-group">
									    <label for="inputPassword3" class="col-sm-2 control-label">店主名字</label>
									    <div class="col-sm-8">
									      <input type="text" readonly readonly class="form-control inp" id="inputPassword3">
									    </div>
									    <div class="col-sm-2">
									    </div>
									  </div>
									  <div class="form-group">
									    <label for="inputPassword3" class="col-sm-2 control-label">所在城市</label>
									    <div class="col-sm-8">
									      <input type="text" readonly class="form-control inp" id="inputPassword3">
									    </div>
									    <div class="col-sm-2">
									    </div>
									  </div>
									  <div class="form-group">
									    <label for="inputPassword3" class="col-sm-2 control-label">真实姓名</label>
									    <div class="col-sm-8">
									      <input type="text" readonly class="form-control inp" id="inputPassword3">
									    </div>
									    <div class="col-sm-2">
									    </div>
									  </div>
									  <div class="form-group">
									    <label for="inputPassword3" class="col-sm-2 control-label">身份证</label>
									    <div class="col-sm-8">
									      <input type="text" readonly class="form-control inp" id="inputPassword3">
									    </div>
									    <div class="col-sm-2">
									    </div>
									  </div>
									  <div class="form-group">
									    <label for="inputPassword3" class="col-sm-2 control-label">餐厅电话</label>
									    <div class="col-sm-8">
									      <input type="text" readonly class="form-control inp" id="inputPassword3">
									    </div>
									    <div class="col-sm-2">
									    </div>
									  </div>
									  <div class="form-group">
									    <label for="inputPassword3" class="col-sm-2 control-label">店铺状态</label>
									    <div class="col-sm-8">
									      <input type="text" readonly class="form-control inp" id="inputPassword3">
									    </div>
									    <div class="col-sm-2">
									    </div>
									  </div>
									  <div class="form-group">
									    <label for="inputPassword3" class="col-sm-2 control-label">餐店介绍</label>
									    <div class="col-sm-8">
									    <textarea  style="resize:none;" readonly class="form-control inp" rows="3"></textarea>
									    </div>
									    <div class="col-sm-2">
									    </div>
									  </div>
									</form>
					   		<div class="modal-footer">
						        <a class="btn btn-default" data-dismiss="modal">确定</a>
						    </div>
					    </div>
					  </div>
					</div>
			</div>
		</div>
	</div>
</section>


@stop

@section('js')
	<script type="text/javascript">

		$('.sh').on('click',function(){
			var id  = $(this).offsetParent().siblings('.name').html();

			$.ajax({
				url:"{{ url('admin/del') }}",
				type:'post',
		        data:{'id':id},
		        success:function(data){
		        	if(data == 1){
		        		location.reload();
		        	}
		        },
		        dataType:'json',
			});

		});


		$('.gl').on('click',function(){
			var id  = $(this).offsetParent().siblings('.name').html();

			$.ajax({
				url:"{{ url('admin/list') }}",
				type:'post',
		        data:{'id':id},
		        success:function(data){
		        	if(data == 0){
		        		location.reload();
		        	}else if(data == 2){
		        		location.reload();
		        	}else if(data == 1){
		        		location.reload();
		        	}
		        },
		        dataType:'json',
			});

		});

		$('.xq').on('click',function(){
			var id  = $(this).offsetParent().siblings('.name').html();
			var i = 0;
			$.ajax({
				url:"{{ url('admin/details') }}",
				type:'post',
		        data:{'id':id},
		        success:function(data){
		        	 $('.inp').each(function(){
		        	 	$(this).val(data[i]);
		        	 	i++;
		        	 });
		        },
		        dataType:'json',
			});

		});

		$('#btn').on('click',function(){
			var asd = $('#select').val();
			$('#frm').append('<input type="hidden" name="status" value='+asd+' ></input>');
		});
	</script>


@stop
