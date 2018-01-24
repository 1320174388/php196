@extends('layouts.admin')
@section('title','添加权限页')
@section('content')

		<div class="finance-content-middle">
			<div class="finance-content-middle-form finance-add-agent-ad">
				<h3>添加角色</h3>
				<div class="finance-add-agent">
					<form action="{{ url('admin/user/doauth') }}" method="post">
						<table class="add_tab">
							<tbody>
							{{csrf_field()}}
							<tr>
								<td><b>用户名：</b></td>
								<td>
									{{ $user->name }}
									<input type="hidden" name="id" value="{{ $user->id }}">
								</td>
							</tr>
							<tr>
								<td><b>角色列表：</b></td>
								<td>
									@foreach($roles as $v)
										{{--如果当前遍历的角色在当前用户拥有的角色列表中，复选框应该加选中状态--}}
										@if(in_array($v->id,$own))
											<label for=""><input type="checkbox" name="role_id[]" checked value="{{ $v->id }}">{{ $v->role_name }}</label>
										@else
											<label for=""><input type="checkbox" name="role_id[]" value="{{ $v->id }}">{{ $v->role_name }}</label>
										@endif

									@endforeach
								</td>
							</tr>

							<tr>
								<th></th>
								<td>
									<input type="submit" style="width: 160px; height: 40px; background: #1e82d4; color:white;" value="提交">
									<input type="button" class="back" style="width: 160px; height: 40px; background: #1e82d4; color:white; margin-left: 70px;" onclick="history.go(-1)" value="返回">
								</td>
							</tr>
							</tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
@stop

