@extends('layouts.admin')
@section('title','管理员详情')
@section('content')
		<div class="finance-content-middle">
			<div class="finance-content-middle-form finance-add-agent-ad">
				<h3>普通管理员</h3>
				<div class="finance-add-agent">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" >
                            <ul style="margin-left: 185px ">
                                @if(is_object($errors))
                                    @foreach ($errors->all() as $error)
                                        <li style="color:red">{{ $error }}</li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    @endif
					<form action="{{ url('/admin/usershow/update') }}" enctype="multipart/form-data" method="post">
						{{csrf_field()}}
						<input type="hidden" name="id" value="{{ $data->id }}">
						<p>
							<label for="inputEmail3" class="col-sm-2 control-label">用户名：</label>
                                <input type="text" class="form-control" name="name" value="{{ $data->name }}" placeholder="请输入用户名">
						</p>
						<p>
							<label for="inputEmail3" class="col-sm-2 control-label">密码：</label>
								<input type="password" value="{{ Crypt::decrypt($data->password) }}" class="form-control" name="password" placeholder="请输入密码">
						</p>
						<p>
							<label for="inputEmail3" class="col-sm-2 control-label">确认密码：</label>
							<input type="password" value="{{ Crypt::decrypt($data->password) }}" class="form-control" name="re-password" placeholder="请输入密码">
						</p>
						<p>
							<label for="inputPassword3" class="col-sm-2 control-label">手机号：</label>
                                <input type="text" value="{{ $data->phone }}" class="form-control" name="phone"
                                       placeholder="请输入手机号">
						</p>
						
						<p>
							<label for="inputPassword3" class="col-sm-2 control-label">邮箱：</label>
                                <input type="text" value="{{ $data->email }}" class="form-control" name="email" placeholder="请输入邮箱">
						</p>
						<p><div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">原始头像：</label>
                            <img width="100" src="/uploads/{{ $data->avatar }}">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">头像：</label>
                            <div class="col-sm-10">
                                <input type="file" name="avatar">
                            </div>
                        </div></p>

						<p><div class="form-group">
							<input type="submit"  style="width: 160px; height: 40px; background: #1e82d4; color:white; margin-left: 70px;" value="修改">
	                        <input type="button" class="back" style="width: 160px; height: 40px; background: #1e82d4; color:white; margin-left: 30px;" onclick="history.go(-1)" value="返回">
	                    </div></p>
					</form>
				</div>
			</div>
		</div>

@stop