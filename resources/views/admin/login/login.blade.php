@extends('layouts.login')
@section('title','后台登录页面')
@section('content')

    <div class="bg"></div>
    <div class="container">
        <div class="line bouncein">
            <div class="xs6 xm4 xs3-move xm4-move">
                <div style="height:150px;"></div>
                <div class="media media-y margin-big-bottom">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @if(is_object($errors))
                                    @foreach ($errors->all() as $error)
                                        <li style="color:red">{{ $error }}</li>
                                    @endforeach
                                @else
                                        <li style="color:red">{{ $errors }}</li>
                                @endif
                            </ul>
                        </div>
                    @endif
                <form action="{{ url('admin/dologin') }}" method="post">
                    {{ csrf_field() }}
                    <div class="panel loginbox">
                        <div class="text-center margin-big padding-big-top">
                            <h1>后台管理中心</h1>
                        </div>
                        <div class="panel-body" style="padding:30px; padding-bottom:10px; padding-top:10px;">
                            <div class="form-group">
                                <div class="field field-icon-right">
                                    <input type="text" class="input input-big" name="username" id="username" value="{{ old('username') }}" placeholder="登录账号" />
                                    <span class="icon icon-user margin-small"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="field field-icon-right">
                                    <input type="password" class="input input-big" name="password" id="password"  placeholder="登录密码" />
                                    <span class="icon icon-key margin-small"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="field">
                                    <input type="text" class="code" value="{{ old('code') }}" style="width:150px;height: 32px;margin-right: 10px"input input-big" name="code" placeholder="填写右侧的验证码" />
                                    <img src="{{ url('admin/yzm') }}" alt="" onclick="this.src='{{ url('admin/yzm') }}?'+Math.random()">
                                </div>
                            </div>
                        </div>
                        <div style="padding:30px;">
                            <input type="submit" id="button" class="button button-block bg-main text-big input-big" value="登录">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection