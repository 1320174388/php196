@extends('shop.header')

@section('title','控制台')

@section('shop',session('home_user_rest')->name)

@section('content')
	<div class="manage account-manage">
		<div class="manage-head">
			<h6 class="layout padding-left manage-head-con">账号管理</h6>
		</div>
		<dl class="account-basic clearfix">
			<dt class="fl">
			<p class="account-head">
				<img src="/uploads/{{ session('home_user')->avatar }}">
			</p>
			</dt>
			<dd class="fl margin-large-left margin-small-top">
			<p class="text-small">
				<span class="show fl base-name">会员账号</span>:<span class="margin-left">{{ session('home_user')->name }}</span>
			</p>
			<p class="text-small">
				<span class="show fl base-name">认证状态</span>:
				<span class="margin-left">@if(session('home_user_rest')->nameid) 已认证 @else 未认证 @endif</span>
				<!-- <a class="margin-left text-main text-underline" href="#">立即认证</a> -->
			</p>
			<p class="text-small">
				<span class="show fl base-name">注册时间</span>:<span class="margin-left">{{ session('home_user')->created_at }}</span>
			</p>
			</dd>
		</dl>
		<div class="account-basic clearfix">
			<span class="fl show text-small">您当前的账号安全程度</span>
			<div class="progress-bar fl margin-large-left margin-large-35">
				<div style="background: rgb(255, 153, 0) none repeat scroll 0% 0%; width: 180px;" data-width="100">
				</div>
			</div>
			<span class="fl show text-small">安全级别: <span style="color: rgb(255, 153, 0);" class="leval-safe"> 高</span></span>
		</div>
		<ul class="accound-bund">
			<li class="clearfix">
			<span class="bund-class">登录密码</span>
			<span class="w45">安全性高的密码可以使账号更安全，建议您定期更换密码，设置一个包含字母，符号或数字中至少两项且长度超过6位的密码。</span>
			<span class="fr margin-large-right">
			<i class="icon icon-been-set fl"></i>
			<em class="margin-right text-green-deep">已设置</em>
			            		|
			<a href="{{ url('home/personal/pwdindex') }}" data-panel="modify_pass" data-title="修改密码-修改密码" data-callback="$(&quot;#modify_pass&quot;).submit();" data-btn="下一步,取消" class="button-word1 margin-left btn_ajax_open">修改</a>
			<input data-panel="modify_pass2" data-title="修改密码-修改完成" data-btn="完成" data-callback="layer.closeAll();" class="modify_pass_setup2 btn_ajax_open" value="第三步" type="hidden">
			</span>
			</li>
			<!-- <li class="clearfix">
			<span class="bund-class">支付密码</span>
			<span class="w45">高效管理企业资金的安全。</span>
			<span class="fr margin-large-right">
			<i class="icon icon-unset fl"></i>
			<em class="margin-right text-yellow-deep">未设置</em>
			            		|
			<a href="#" data-panel='modify-payment-set' data-title='设置支付密码-验证身份' data-btn='下一步,取消' data-callback='$("#modify_paypass_set_sendsms").submit();' class="button-word1 margin-left btn_ajax_open">设置</a>
			<input type="hidden" data-panel='modify-payment-set2' data-title='设置支付密码-设置密码' data-btn='下一步,取消' data-callback='$("#modify_paypass_set_ediopassword").submit()' class="modify_pay-set2 btn_ajax_open">
			<input type="hidden" data-panel='modify-payment-set3' data-title='设置支付密码-设置完成' data-btn='完成' data-callback='layer.closeAll();' class="modify_pay-set3_over btn_ajax_open" value="第三步">
			</span>
			</li>
			  -->
			<li class="clearfix">
			<span class="bund-class">邮箱绑定</span>
			<span class="w45">绑定邮箱可以用于安全验证、找回密码等重要操作</span>
			<span class="fr margin-large-right">
			<i class="icon icon-been-set fl"></i>
			<em class="margin-right text-green-deep">已设置</em>
			            					            		|
			<a href="#" data-panel="modify-email-revise" data-title="修改绑定邮箱-邮箱验证" data-btn="发送验证到邮箱,取消" data-callback="$(&quot;#modify_email&quot;).submit();" class="button-word1 margin-left btn_ajax_open">修改</a>
			<input data-panel="modify-email-revise2" data-title="修改绑定邮箱-修改成功" data-btn="完成" data-callback="layer.closeAll();" class="modif_email_setup2 btn_ajax_open" type="hidden">
			</span>
			</li>
			<!-- <li class="clearfix">
			<span class="bund-class">手机绑定</span>
			<span class="w45">您已绑定了手机<em class="text-green-deep">155****44</em>，[您的手机为安全手机，可以找回密码，但不能用于登录；为保障您账户安全，如果换绑的手机，5天之内只能操作一次。]</span>
			<span class="fr margin-large-right">
			<i class="icon icon-been-set fl"></i>
			<em class="margin-right text-green-deep">已设置</em>
			            		|
			<a href="#" data-panel='modify_mobile' data-title='修改绑定手机-验证身份' data-btn='下一步,取消' data-callback='$("#modify_mobile_sendsms").submit();' class="button-word1 margin-left btn_ajax_open">修改</a>
			<input type="hidden" data-panel='modify_mobile2' data-title='修改绑定手机-验证手机' data-btn='下一步,取消' data-callback='$("#modify_new_mobile_set").submit();' class="modify_reset_mobile2 btn_ajax_open">
			<input type="hidden" data-panel='modify_mobile3' data-title='修改绑定手机-修改成功' data-btn='完成' data-callback='layer.closeAll();' class="mobile-revise3-over btn_ajax_open" value="第三步">
			</span>
			</li>
			<li class="clearfix">
			<span class="bund-class">QQ绑定</span>
			<span class="w45">短信账户查询,办公沟通高效轻松,企业实时通讯录，内部联络方便快捷。</span>
			<span class="fr margin-large-right">
			<i class="icon icon-unset fl"></i>
			<em class="margin-right text-yellow-deep">未设置</em>
								|
			<a href="#" class="button-word1 margin-left">设置</a>
			<!--  <em class="margin-right text-green-deep">已设置</em>|<a href="#" data-panel='modify-QQ-revise' data-title='修改绑定QQ-身份验证' data-btn='下一步,取消' data-callback='layer.closeAll();$(".QQ-revise2").trigger("click")' class="button-word1 margin-left btn_ajax_open">修改</a>
			<input type="hidden" data-panel='modify-QQ-revise2' data-title='修改绑定QQ-输入QQ' data-btn='发送验证到QQ邮箱' data-callback='layer.closeAll();$(".QQ-revise3").trigger("click")' class="QQ-revise2 btn_ajax_open">
			<input type="hidden" data-panel='modify-QQ-revise3' data-title='修改绑定QQ-修改成功' data-btn='完成' data-callback='layer.closeAll();' class="QQ-revise3 btn_ajax_open" value="第三步">
			</span>
			</li>
			<li class="clearfix">
			<span class="bund-class">微信绑定</span>
			<span class="w45">微信移动客户端和PC端后台互相结合，只需要关注企业号即可进行操作，突破时间和空间的限制。</span>
			<span class="fr margin-large-right">
			<i class="icon icon-unset fl"></i>
			<em class="margin-right text-yellow-deep">未设置</em>
			            		|
			<a href="#" class="button-word1 margin-left">设置</a>
			</span>
			</li>
			 -->
			<<!-- li class="clearfix border-bottom-none">
			<span class="bund-class">邀请链接</span>
			<span class="w45" id="fe_text">http://t.cn/Edcx4Wt</span>
			<span class="fr margin-large-right">
			<a class="button-word1 margin-left" id="copy_button" data-clipboard-target="fe_text" href="#">复制链接</a>
			</span>
			</li> -->
		</ul>
	</div>
@stop

@section('js')

@stop