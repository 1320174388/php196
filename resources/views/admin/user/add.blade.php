@extends('layouts.admin')
@section('title','添加管理员')
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
					<form action="{{ url('/admin/user/insert') }}" enctype="multipart/form-data" method="post">
						{{csrf_field()}}
						<p>
							<label>用户名：</label>
							<input type="text" class="form-control" id="inputEmail3" name="name" value="{{ old('name') }}" placeholder="请输入用户名">
							<em>*(必填)</em>
						</p>
						<p>
							<label>密码：</label>
							<input type="password" value="{{ old('password') }}" class="form-control" id="inputPassword3" name="password" 
                                               placeholder="请输入密码">
							<em>*(必填)</em>
						</p>
						<p>
							<label>确认密码：</label>
							<input type="password" value="{{ old('re-password') }}" class="form-control" id="inputPassword3" name="re-password" 
                                               placeholder="确认输入密码">
							<em>*(必填)</em>
						</p>
						<p>
							<label>手机号：</label>
							<input type="text" value="{{ old('phone') }}" class="form-control" id="inputPassword3" name="phone" 
                                               placeholder="请输入手机号">
							<em>*(必填)</em>
						</p>
						
						<p>
							<label>邮箱：</label>
							<input type="text" value="{{ old('email') }}" class="form-control" id="inputPassword3" name="email" 
                                               placeholder="请输入邮箱">
							<em>*(必填)</em>
						</p>
						<p><div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">头像:</label>

                            <div class="col-sm-10">
                                <input type="file" name="avatar" id="inputPassword3" >
                            </div>
                        </div></p>

						<p><div class="form-group">
							<input type="submit"  style="width: 160px; height: 40px; background: #1e82d4; color:white; margin-left: 70px;" value="添加">
	                        <input type="button" class="back" style="width: 160px; height: 40px; background: #1e82d4; color:white; margin-left: 30px;" onclick="history.go(-1)" value="返回">
	                    </div></p>
					</form>
				</div>
			</div>
		</div>
@endsection
</html>
