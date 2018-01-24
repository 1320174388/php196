@extends('layouts.admin')
@section('title','权限修改页面')
@section('content')

		<div class="finance-content-middle">
			<div class="finance-content-middle-form finance-add-agent-ad">
				<h3>权限</h3>
				<div class="finance-add-agent">
					<form action="{{ url('admin/role/update/'.$user->user_id) }}" method="post">
						<tbody>
						{{csrf_field()}}
						<input type="hidden" name="_method" value="PUT">
						<p>
							<label>角色：</label>
							<input type="text" class="form-control" name="role_name" value="{{ $user->role_name }}" placeholder="请输入角色">
							<em>*(必填)</em>
						</p>
						<p>
							<label>描述：</label>
							<input type="text" value="{{ $user->role_description }}" class="form-control" name="role_description" placeholder="请输入描述">
							<em>*(必填)</em>
						</p>
						<p><div class="form-group">
							<input type="submit"  style="width: 160px; height: 40px; background: #1e82d4; color:white; margin-left: 70px;" value="修改">
							<input type="button" class="back" style="width: 160px; height: 40px; background: #1e82d4; color:white; margin-left: 30px;" onclick="history.go(-1)" value="返回">
						</div></p>
						</tbody>
					</form>
				</div>
			</div>
		</div>
@stop

