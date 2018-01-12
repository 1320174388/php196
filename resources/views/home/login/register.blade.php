 @extends('layout.home.login.login')

  @section('css')
   <link class="usemin" rel="stylesheet" href="{{ asset('/home/css/global_rebuild.a739f3af.css') }}" /> 
   <link class="usemin" rel="stylesheet" href="{{ asset('/home/css/account_rebuild.54cf8909.css') }}" /> 
  @show
 
@section('content')
  <div  class="alert alert-danger">
    <ul>
      <li id="niubiclass" style="color:red"></li>
    </ul>
  </div>

  <div class="panel-bd"> 
     <form id="register_form" class="form"  action="/register" method="post" > 
      <div class="form-item"> 
      {{ csrf_field() }}
       <input id="register_username" class="inputbox js_inputbox async" name="name" type="text" minlength="6" maxlength="18" placeholder="用户名" required=""  value="{{ old('name') }}"/> 
       <div class="g-error-tip hide"></div> 
      </div> 
      <div class="form-item"> 
       <input id="register_email" class="inputbox js_inputbox async" name="email" type="text" placeholder="电子邮箱" required="" value="{{ old('email') }}"/> 
       <div class="g-error-tip hide"></div> 
      </div> 
      <div class="form-item"> 
       <input id="register_password" class="inputbox js_inputbox" name="password" type="password" minlength="6" maxlength="18" placeholder="密码" required="" /> 
       <div class="g-error-tip hide"></div> 
      </div> 
      <div class="form-item"> 
       <input id="register_repeat_password" class="inputbox js_inputbox" name="repwd" type="password" minlength="6" maxlength="18" placeholder="确认密码" required="" /> 
       <div class="g-error-tip hide"></div> 
      </div> 
      <div class="form-item clrfix"> 
       <input id="captcha_input" class="inputbox input-captcha" type="text" name="code" minlength="4" maxlength="4" placeholder="验证码" autocomplete="off" required="" /> 
       <div class="g-error-tip hide"></div> 
       <img id="captcha_img" class="captcha-img" data-action="login" src="{{ url('/code/captcha/9') }}" alt="验证码" onclick="this.src='{{ url('/code/captcha/9') }}?'+Math.random()" title="请填写验证码" /> 
      </div> 
      <div class="form-helper form-text"> 
       <a class="g-link" href="" target="_blank">使用条款和协议</a> 
      </div> 
      <button id="btn" class="g-btn g-btn-l g-btn-submit" type="submit">同意协议并注册</button> 
     </form> 
    </div> 
    <div class="panel-ft"> 
     <div class="g-oauth"> 
     </div> 
     <a class="g-link" href="{{ url('/login') }}">登录</a> 
    </div> 
   </div> 
  </div> 
 
@stop

@section('js')
 
  <script type="text/javascript">
   
    $(".async").on('blur',function(){

      var name = $(this).attr('name');

      var val = $(this).val();
      
      // alert(name);
      $.ajax({
          type: "post",
          url: "{{ url('/zcajax') }}",
          data: {'name':name,'val':val},
          success:function(data){
            if(data==1){
              $('#niubiclass').text('用户名已存在');
              $('#btn').on('click',function(){
                return false;
              })
            }else if(data==2){
              $('#niubiclass').text('邮箱已被注册');
              $('#btn').on('click',function(){
                return false;
              })
            }else{
              $('#niubiclass').text('');
              $('#btn').unbind('click');
            }
          },

          dataType:'json',
      });

    });
  </script>>
@stop