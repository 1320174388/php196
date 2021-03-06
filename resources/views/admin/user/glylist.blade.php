@extends('layouts.admin')
@section('title','管理员管理')
@section('content')

	<div class="finance-content-middle">
		<div class="finance-content-middle-form">
			<form action="{{ url('/admin/user') }}" method="get">
				<div class="row">
					<div class="col-md-2">
						<select name="num" class="form-control">
							<option
									@if($where['num']==3)
									selected
									@endif
							>3</option>
							<option
									@if($where['num']==6)
									selected
									@endif>6</option>
							<option
									@if($where['num']==10)
									selected
									@endif>10</option>
							<option
									@if($where['num']==12)
									selected
									@endif>12</option>
							<option
									@if($where['num']==15)
									selected
									@endif>15</option>
						</select>
					</div>

					<div class="col-md-3">
						<div class="input-group">
							<input type="text" name="name" class="form-control" placeholder="请输入用户名" style="border-radius: 4px;" value="{{ $where['name'] }}">

						</div>
					</div>
					<div class="col-md-3">
						<div class="input-group">
							<input type="text" name="phone" class="form-control" placeholder="请输入手机号" style="border-radius: 4px;" value="{{ $where['phone'] }}">

						</div>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<input type="text" name="email" class="form-control" placeholder="请输入邮箱" value="{{ $where['email'] }}">
							<span class="input-group-btn">
					                      		<button class="btn btn-info btn-flat" style="line-height:20px; height: 33px;border-radius: 3px;">搜索一下</button>
					                    	</span>
						</div>
					</div>
					<hr>
				</div>
			</form>
			<div class="finance-add-agent finance-add-agent-color">
				<table class="table" style="font-size: 15px;" >
					<tbody>
					<tr>
						<th>ID</th>
						<th>用户名</th>
						<th>邮箱</th>
						<th>头像</th>
						<th>手机号</th>
						<th>状态</th>
						<th>操作</th>
						<th>授权</th>
					</tr>
					@foreach($data as $k=>$v)
						<tr>
							<td class="id">{{ $v->id }}</td>
							<td class="name">{{ $v->name }}</td>
							<td class="email">{{ $v->email }}</td>
							<td class="avatar"><img style="height: 40px;" src="/uploads/{{ $v->avatar }}" alt="{{ $v->avatar }}"></td>
							<td class="phone">{{ $v->phone }}</td>
							<td class="award-name">
								@if ( $v->status === 1 )
									超级管理员
								@elseif ( $v->status === 2 )
									普通管理员
								@else
									已被禁用
								@endif
							</td>
							<td class="disable">
								<a class="disable btn btn-primary btn-xs">
									@if ( $v->status === 1 )超级管理员
									@elseif($v->status == 3) 解封
									@elseif($v->status == 2) 禁用
									@endif</a>
							</td>
							<td>
								<a class="sq-4+6? btn btn-primary btn-xs" href="{{ url('admin/user/auth/'.$v->id) }}">授权</a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
			<div class="finance-page clearfix" style="float: left;width: 100%">
				{!! $data->appends($where)->render() !!}
			</div>
		</div>
	</div>
	<script type="text/javascript">
        $('.disable').on('click',function(){
            var id  = $(this).offsetParent().siblings('.id').html();
            $.ajax({
                url:"{{ url('admin/user/updategl') }}",
                type:'post',
                data:{'id':id,'_token':"{{ csrf_token() }}"},
                success:function(data){
                    if(data == 2){
                        location.reload();
                    }else if(data == 3){
                        location.reload();
                    }
                },
                dataType:'json',
            });
        });
	</script>
@stop
