<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户浏览页</title>
</head>
<body>
	<center>
		<h1>这是用户浏览页面</h1>
		<hr>
		<table border="2" cellpadding="5">
		<tr>
			<th>ID</th>
			<th>姓名</th>
			<th>密码</th>
			<th>邮箱</th>
			<th>手机号</th>
			<th>查看</th>
			<th>操作</th>
		</tr>
		@foreach($data as $val)
		<tr>
			<td>{{ $val->id }}</td>
			<td>{{ $val->name }}</td>
			<td>{{ $val->password }}</td>
			<td>{{ $val->email }}</td>
			<td>{{ $val->phone }}</td>
			<td><a href="{{ url('/user/'.$val->id) }}">详情</a></td>
			<td>
				<a href=""> </a>
				<form action="{{ url('/user/'.$val->id.'/edit') }}" method="get">
					<input type="submit" value="编辑">
				</form>
				<form action="/user/{{ $val->id }}" method="post">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<input type="submit" value="删除">
				</form>
			</td>
		</tr>
		@endforeach
		</table>
	</center>
</body>
</html>