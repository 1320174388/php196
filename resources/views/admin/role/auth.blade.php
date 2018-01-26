@extends('layouts.admin')
@section('title','添加权限页')
@section('content')

		<div class="finance-content-middle">
			<div class="finance-content-middle-form finance-add-agent-ad">
				<h3>添加角色</h3>
				<div class="finance-add-agent">
					<form action="{{ url('admin/role/doauth') }}" method="post">
						<table class="add_tab">
							<tbody>
							{{csrf_field()}}
							<p><tr>
								<td><b>角色名：</b></td>
								<td>
									{{ $role->role_name }}
									<input type="hidden" name="role_id" value="{{ $role->id }}">
								</td>
							</tr></p>
							<p><tr>
								<td style="width: 120px;"><b>权限列表：</b></td>
								<td>
									@foreach($pers as $v)
										{{--如果当前遍历的角色在当前用户拥有的角色列表中，复选框应该加选中状态--}}
										@if(in_array($v->id,$own))
											<label for=""><input type="checkbox" name="permission_id[]" checked value="{{ $v->id }}">{{ $v->permission_name }}</label>
										@else
											<label for=""><input type="checkbox" name="permission_id[]" value="{{ $v->id }}">{{ $v->permission_name }}</label>
										@endif

									@endforeach
								</td>
							</tr></p>
							<p><tr>
								<th></th>
								<td>
									<input type="submit" style="width: 160px; height: 40px; background: #1e82d4; color:white; margin-left: 70px;" value="提交">
									<input type="button" class="back" style="width: 160px; height: 40px; background: #1e82d4; color:white; margin-left: 70px;" onclick="history.go(-1)" value="返回">
								</td>
							</tr></p>
							</tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
@stop

