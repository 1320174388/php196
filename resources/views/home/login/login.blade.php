 @extends('layout.home.login.login')
  

@section('css')
  <link class="usemin" rel="stylesheet" href="{{ asset('/home/css/global_rebuild.a739f3af.css') }}"  /> 
  <link class="usemin" rel="stylesheet" href="{{ asset('/home/css/account_rebuild.54cf8909.css') }}" /> 
@stop

 @section('content')
        
    <div class="panel-bd"> 

     <form id="login_form" class="login-form block" action="/login" method="post"> 
      <div class="form-item"> 
      {{ csrf_field() }}
       <input class="inputbox" name="name" type="text" maxlength="18" minlength="6" placeholder="用户名/电子邮箱/手机号" required="" value="{{ old('name') }}"/> 
       <div class="g-error-tip hide"></div> 
      </div> 
      <div class="form-item">
       <input class="inputbox" name="password" type="password" minlength="6" maxlength="18" placeholder="密码" required="" /> 
       <div class="g-error-tip hide"></div> 
      </div> 
      <div class="form-item clrfix"> 
       <input id="captcha_input" class="inputbox input-captcha" type="text" name="code" minlength="4" maxlength="4" placeholder="验证码" autocomplete="off" required="" /> 
       <div class="g-error-tip hide"></div> 
       <img id="captcha_img" class="captcha-img" data-action="login" src="{{ url('/code/captcha/9') }}" alt="验证码" onclick="this.src='{{ url('/code/captcha/9') }}?'+Math.random()" title="请填写验证码" /> 
      </div> 
      <div class="form-helper"> 
       <label class="login-checkbox"> <input class="login-remember" type="checkbox" name="remember" checked="" /> 下次自动登录 </label> 
       <a class="g-link js_link_register" href="register.html">忘记密码</a> 
      </div> 
      <button class="g-btn g-btn-l g-btn-submit" type="submit">登录</button> 
     </form> 

    </div> 
    <div class="panel-ft">
       <a class="g-btn g-btn-l g-btn-submit" href="{{ url('/register') }}">免费注册</a>
    </div> 
   </div> 
  </div> 

@stop
