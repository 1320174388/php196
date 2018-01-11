<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户详情页</title>
</head>
<body>
	<center>
		<h1>这是用户详情页</h1>
		<hr>
		<table border="2" cellpadding="5">
			<tr>
				<td>用户名：</td>
				<td>{{ $data->name }}"</td>
			</tr>
			<tr>
				<td>密码：</td>
				<td>{{ $data->password }}"</td>
			</tr>
			<tr>
				<td>邮箱：</td>
				<td>{{ $data->email }}"</td>
			</tr>
			<tr>
				<td>手机号：</td>
				<td>{{ $data->phone }}"</td>
			</tr>
		</table>
	</center>
</body>
</html>