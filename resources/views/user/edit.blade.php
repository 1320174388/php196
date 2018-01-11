<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户编辑页</title>
</head>
<body>
	<center>
		<h1>这是用户编辑页</h1>
		<hr>
		<form action="/user/{{ $data->id }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<table>
				<tr>
					<td>用户名：</td>
					<td><input type="text" name="name" value="{{ $data->name }}" ></td>
				</tr>
				<tr>
					<td>密码：</td>
					<td><input type="test" name="password" value="{{ $data->password }}"></td>
				</tr>
				<tr>
					<td>邮箱：</td>
					<td><input type="email" name="email" value="{{ $data->email }}"></td>
				</tr>
				<tr>
					<td>手机号：</td>
					<td><input type="text" name="phone" value="{{ $data->phone }}"></td>
				</tr>
			</table>
			<hr>
			<td><input type="submit" value="确定添加"></td>
		</form>
	</center>
</body>
</html>