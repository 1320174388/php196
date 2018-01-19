 @extends('layout.home.login.login')

  @section('css')
   <link class="usemin" rel="stylesheet" href="{{ asset('/home/css/global_rebuild.a739f3af.css') }}" /> 
   <link class="usemin" rel="stylesheet" href="{{ asset('/home/css/account_rebuild.54cf8909.css') }}" /> 
  @show
 
@section('content')
  <div  class="alert alert-danger">
    <ul>
      <li id="errorname" class="error" style="color:red"></li>
      <li id="erroremail" class="error" style="color:red"></li>
    </ul>
  </div>
  <div class="panel-bd"> 
     <form id="register_form" class="form"  action="/forget" method="post" > 
      <div class="form-item"> 
      {{ csrf_field() }}
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
       <input id="captcha_input" class="inputbox input-captcha" type="text" name="yzm" minlength="4" maxlength="4" placeholder="邮箱验证码" autocomplete="off" required="" /> 
       <div class="g-error-tip hide"></div> 
       <button id="yzm" class="captcha-img" type="button">发送验证码</button>
      </div> 
      <div class="form-item clrfix"> 
       <input id="captcha_input" class="inputbox input-captcha" type="text" name="code" minlength="4" maxlength="4" placeholder="验证码" autocomplete="off" required="" /> 
       <div class="g-error-tip hide"></div> 
       <img id="captcha_img" class="captcha-img" data-action="login" src="{{ url('/code/captcha/9') }}" alt="验证码" onclick="this.src='{{ url('/code/captcha/9') }}?'+Math.random()" title="请填写验证码" /> 
      </div> 
      <div class="form-helper form-text"> 
      </div> 
      <button id="btn" class="g-btn g-btn-l g-btn-submit" type="submit">修改密码</button> 
     </form> 
    </div> 
    <div class="panel-ft"> 
     <a class="g-link" href="{{ url('/login') }}">登录</a> 
    </div> 
   </div> 
  </div> 
 
@stop

@section('js')
  

  <script type="text/javascript">
    
    var mail = null;

    $('#yzm').on('click',function(){
      var i = 5;
      name = $('#register_username').val();
      email =  $('#register_email').val();


     var init = setInterval(function(){
            i--;

            var str = '';
            if(i <= 0)
            {
                str = '重新发送';
                $('#yzm').html(str);
                $('#yzm').attr('disabled',false);
                clearInterval(init);
                return ;
            }

            str = '重新发送('+ i +')';
            $('#yzm').html(str);
            $('#yzm').attr('disabled',true);

            
        }, 1000);


     $.ajax({
          type:'post',
          url:"{{ url('/mail') }}",
          data:{'email':email},
          success:function(data){

          },
          dataType:'json',

     });


    });


  </script>

@stop