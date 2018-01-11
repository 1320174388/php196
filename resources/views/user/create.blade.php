<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户添加页</title>
</head>
<body>
	<center>
		<h1>这是用户添加页面</h1>
		<hr>
		<form action="/user" method="POST">
			{{ csrf_field() }}
			<table>
				<tr>
					<td>用户名：</td>
					<td><input type="text" name="name" ></td>
				</tr>
				<tr>
					<td>密码：</td>
					<td><input type="password" name="password" ></td>
				</tr>
				<tr>
					<td>邮箱：</td>
					<td><input type="email" name="email"></td>
				</tr>
				<tr>
					<td>手机号：</td>
					<td><input type="text" name="phone"></td>
				</tr>
			</table>
			<hr>
			<td><input type="submit" value="确定添加"></td>
		</form>
	</center>
</body>
</html>