<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>用户名</th>
            <th>密码</th>
            <th>操作</th>
        </tr>
        @foreach($users as $v)
        <tr>
            <td>{{ $v->id }}</td>
            <td>{{ $v->user_name }}</td>
            <td>{{ $v->user_pass }}</td>
            <td><a href="{{ url('user/edit/'.$v->id) }}">修改</a>
                <a href="{{ url('user/del/'.$v->id) }}">删除</a></td>
        </tr>
         @endforeach
    </table>
</body>
</html>