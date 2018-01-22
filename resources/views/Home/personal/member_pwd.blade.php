@extends('layout.home.personal.personal')
@section('content')

     @section('name', '修改密码')
       <h2>修改密码</h2> 
      </div> 
      <div class="content-inner profile-changepwd"> 
    
       <form action="{{ url('/home/personal/pwd') }}" class="form-horizontal" method="post" id="changepwd_form">
        
    @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @if(is_object($errors))
              @foreach ($errors->all() as $error)
              <li class="aaaa" style="color:red">{{ $error }}</li>
              @endforeach
            @else
                <li class="aaaa" style="color:green">{{ $errors }}</li>
            @endif
          </ul>
        </div>
      @endif
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
        {{ csrf_field() }}
        <fieldset> 
         <div class="control-group clear-fix"> 
          <label class="control-label" for=""><span class="required">*</span>原密码</label> 
          <div class="controls"> 
           <input name="old_password" id="sf_guard_user_old_pwd" type="password" /> 
           <p class="help-block">(请输入现在正在使用的密码)</p> 
          </div>
          <!--end input--> 
         </div>
         <!--end clearfix--> 
         <div class="control-group"> 
          <label class="control-label" for=""><span class="required">*</span>新密码</label> 
          <div class="controls"> 
           <input name="new_password" id="sf_guard_user_new_pwd" type="password" /> 
           <p class="help-block">（请输入新密码）</p> 
          </div>
          <!--end input--> 
         </div>
         <!--end clearfix--> 
         <div class="control-group clear-fix"> 
          <label class="control-label" for=""><span class="required">*</span>重复新密码</label> 
          <div class="controls"> 
           <input name="news_password" id="sf_guard_user_repeat_pwd" type="password" /> 
           <p class="help-block">(请再输入一次新密码)</p> 
          </div>
          <!--end input--> 
         </div>
         <!--end clearfix--> 
         <div class="form-actions"> 
          <!-- <button type="button"  class="btn btn-yellow" id="sf_guard_user_changepwd_submit">提交更改</button> -->
          <input class="btn btn-yellow" id="sf_guard_user_changepwd_submit" value="提交更改" type="submit"> 
         </div> 
        </fieldset> 
       </form> 
      </div> 
     </div> 
    </div> 
   </div> 
@endsection