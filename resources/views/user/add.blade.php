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
<form action="{{ url('user/store') }}" method="post">
    <table>
        <tr>
            <td>用户名</td>
            {{--生成一个token--}}
            {{ csrf_field() }}
            {{--等价于上面的语句--}}
            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

            <td><input type="text" name="user_name"></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="password" name="user_pass"></td>
        </tr>
        <tr>
            <td><input type="submit" value="提交"></td>
        </tr>
    </table>
</form>
</body>
</html>