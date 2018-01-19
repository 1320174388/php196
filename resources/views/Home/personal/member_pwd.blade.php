@extends('layout.home.personal.personal')
@section('content')
     <span class="breadcrumb-divider">/</span> 修改密码 
    </nav> 
    <div class="wash-paper clearfix" id="profile"> 
     <nav class="profile-nav"> 
      <ul class="nav nav-list"> 
       <li> <a href="member_index.html"> <i class="icon-user"></i> 个人中心 </a> </li> 
       <li class="divider"></li> 
       <li class="nav-header">饿单中心</li> 
       <li> <a href="member_order.html"> <i class="icon-calendar"></i> 最近一个月 </a> </li> 
       <li> <a href="member_order_month.html"> <i class="icon-list-alt"></i> 一个月之前 </a> </li> 
       <li> <a href="member_comments.html"> <i class="icon-star-empty"></i> 未点评饿单 </a> </li> 
       <li> <a href="member_order_refund.html"> <i class="icon-file"></i> 退单中饿单 </a> </li> 
       <li class="divider"></li> 
       <li class="nav-header">我的收藏</li> 
       <li> <a href="member_collect_shop.html"> <i class="icon-heart"></i> 我收藏的餐厅 </a> </li> 
       <li> <a href="member_collect_food.html"> <i class="icon-star"></i> 我收藏的美食 </a> </li> 
       <li class="divider"></li> 
       <li class="nav-header">账户相关</li> 
       <li> <a href="member_addr.html"> <i class="icon-list"></i> 我的地址 </a> </li> 
       <li> <a href="member_red_packet.html"> <i class="icon-tag"></i> 我的红包 </a> </li> 
       <li> <a href="member_invite.html"> <i class="icon-gift"></i> 邀请好友 <span style="color: #fff; background: red; padding: 0 5px; border-radius: 4px;">HOT</span> </a> </li> 
       <li class="divider"></li> 
       <li class="nav-header">安全中心</li> 
       <li class="active"> <a href="member_pwd.html"> <i class="icon-cog icon-white"></i> 修改密码 </a> </li> 
       <li> <a href="member_safe_set.html"> <i class="icon-lock"></i> 安全设置 </a> </li> 
       <li class="divider"></li> 
       <li class="nav-header">在线支付</li> 
       <li> <a href="member_schedule.html"> <i class="icon-eye-open"></i> 收支明细 </a> </li> 
      </ul> 
     </nav> 
     <div class="main-content"> 
      <div class="content-header"> 
       <h2>修改密码</h2> 
      </div> 
      <div class="content-inner profile-changepwd"> 
       <form action="{{ url('/home/personal/pwd') }}" class="form-horizontal" method="post" id="changepwd_form">
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