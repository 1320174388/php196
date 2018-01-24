@extends('layouts.admin')
@section('title','权限列表')
@section('content')

	<div class="finance-content-middle">
		<div class="finance-content-middle-form">
			<div class="finance-add-agent finance-add-agent-color">
				<table class="table" style="font-size: 15px;" >
					<tr>
						<th class="tc">ID</th>
						<th>权限名称</th>
						<th>权限描述</th>
						<th>操作</th>
					</tr>
					@foreach($role as $k=>$v)
						<tr>
							<td class="tc">{{ $v->id }}</td>
							<td>
								<a href="#">{{ $v->role_name }}</a>
							</td>
							<td >{{ $v->role_description }}</td>
							<td>
								<a href="{{ url('admin/role/'.$v->id.'/edit') }}">修改</a>
								<a href="{{ url('admin/role/auth/'.$v->id) }}">授权</a>
								<a href="javascript:;" onclick="delUser({{ $v->id }})">删除</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</div>
		</div>
	</div>
	<style>
		table{table-layout: fixed;word-break: break-all; word-wrap: break-word; }
		.award-name{-o-text-overflow:ellipsis;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;width:100%; }
		.page_list ul li span{
			padding: 6px 12px;
		}
	</style>

	<script>
        function delUser(id){
            //询问框
            layer.confirm('您确定要删除吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //向服务器发送ajax请求，删除当前id对应的用户数据
                // $.post('请求的路由','携带的参数','处理成功后的返回结果')
				dd(id);
                $.post('{{ url('admin/user/') }}/'+id,
					{'_method':'delete','_token':"{{csrf_token()}}"},
				function (data) {
                    if(data.status == 0){
                        layer.msg(data.message, {icon: 6});
                        setTimeout(function(){
                            window.location.href = location.href;
                        },2000);
                    }else{
                        layer.msg(data.message, {icon: 5});

                        window.location.href = location.href;
                    }
                })
            }, function(){

            });
        }
	</script>
@stop