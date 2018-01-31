<!DOCTYPE html>
<html lang="zh">
 <head> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" /> 
  <script type="text/javascript">

  </script> 
  <title>个人中心</title> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="{{ asset('home/css/forward_201503262210.css') }}" type="text/css" rel="stylesheet" /> 
 
  <link rel="apple-touch-icon-precomposed" href="/home/images/apple-touch-icon.png?v=2" /> 
  <link rel="shortcut icon" href="/home/images/favicon.ico?v=2" type="image/x-icon" /> 
  <script type="text/javascript" src="{{ asset('/home/js/cdn_detect.js') }}"></script> 
  <script>
  // if(!window.CDNReady){var d=new Date;d.setHours(d.getHours()+6);document.cookie="CDNDown=1; domain=ele.me; expires="+d.toUTCString()+"; path=/";if(!window.localStorage.getItem("CDNBackup")){window.localStorage.setItem("CDNBackup",1);location.reload(true)}}
</script> 

  <script type="text/javascript" src="{{ asset('/home/js/head_201503262210.js') }}"></script> 
    <!-- // <script type="text/javascript" src="{{ asset('home/js/foot_201503262210.js') }}"></script>  -->
  <script type="text/javascript" src="{{ asset('/home/js/profile_201503262210.js') }}"></script> 
  <script type="text/javascript" src="{{ asset('/layer/layer.js') }}"></script>
  @section('css')

  @show
 </head> 
 <!--[if IE 8]><body class="lt-ie9 lt-ie10"><![endif]--> 
 <!--[if IE 9]><body class="lt-ie10"><![endif]--> 
 <!--[if gt IE 9]><!--> 
 <body> 
  <!--<![endif]--> 
  <link href="{{ asset('/home/css/background.css?v=5') }}" type="text/css" rel="stylesheet" /> 
  <div id="background" style="background-position:1px -10689.583333333px;background-color:#C0DEED;" class=" night "> 
   <div id="sun"></div> 
   <div id="moon"></div> 
   <div id="clouds"> 
    <div id="cloudGroup1"> 
     <img src="{{ asset('/home/images/clouds.png') }}" alt="" id="cloudPiece1" class="cloudPiece" /> 
     <img src="{{ asset('/home/images/clouds.png') }}" alt="" id="cloudPiece2" class="cloudPiece" /> 
     <img src="{{ asset('/home/images/clouds.png') }}" alt="" id="cloudPiece3" class="cloudPiece" /> 
    </div> 
    <div id="cloudGroup2"> 
     <img src="{{ asset('/home/images/clouds.png') }}" alt="" id="cloudPiece4" class="cloudPiece" /> 
     <img src="{{ asset('/home/images/clouds.png') }}" alt="" id="cloudPiece5" class="cloudPiece" /> 
     <img src="{{ asset('/home/images/clouds.png') }}" alt="" id="cloudPiece6" class="cloudPiece" /> 
    </div> 
    <div id="cloudGroup3"> 
     <img src="{{ asset('/home/images/clouds.png') }}" alt="" id="cloudPiece7" class="cloudPiece" /> 
     <img src="{{ asset('/home/images/clouds.png') }}" alt="" id="cloudPiece8" class="cloudPiece" /> 
    </div> 
   </div> 
   <div id="bg_stars"> 
    <div class="star_type_1_big"> 
     <div class="bg_star" id="star1_1"></div> 
     <div class="bg_star" id="star1_2"></div> 
     <div class="bg_star" id="star1_3"></div> 
     <div class="bg_star" id="star1_4"></div> 
     <!--             <div class="bg_star" id="star1_5"></div>
            <div class="bg_star" id="star1_6"></div> --> 
    </div> 
    <div class="star_type_1_normal"> 
     <div class="bg_star" id="star1_7"></div> 
     <div class="bg_star" id="star1_8"></div> 
     <div class="bg_star" id="star1_9"></div> 
     <div class="bg_star" id="star1_10"></div> 
     <div class="bg_star" id="star1_11"></div> 
     <div class="bg_star" id="star1_12"></div> 
    </div> 
    <div class="star_type_1_small"> 
     <div class="bg_star" id="star1_13"></div> 
     <div class="bg_star" id="star1_14"></div> 
     <div class="bg_star" id="star1_15"></div> 
     <div class="bg_star" id="star1_16"></div> 
     <div class="bg_star" id="star1_17"></div> 
     <div class="bg_star" id="star1_18"></div> 
    </div> 
    <div class="star_type_2_big"> 
     <div class="bg_star" id="star2_1"></div> 
     <div class="bg_star" id="star2_2"></div> 
     <div class="bg_star" id="star2_3"></div> 
     <div class="bg_star" id="star2_4"></div> 
    </div> 
    <div class="star_type_2_normal"> 
     <div class="bg_star" id="star2_7"></div> 
     <div class="bg_star" id="star2_8"></div> 
     <div class="bg_star" id="star2_9"></div> 
     <div class="bg_star" id="star2_10"></div> 
     <div class="bg_star" id="star2_11"></div> 
     <div class="bg_star" id="star2_12"></div> 
    </div> 
    <div class="star_type_2_small"> 
     <div class="bg_star" id="star2_13"></div> 
     <div class="bg_star" id="star2_14"></div> 
     <div class="bg_star" id="star2_15"></div> 
     <div class="bg_star" id="star2_16"></div> 
     <div class="bg_star" id="star2_17"></div> 
     <div class="bg_star" id="star2_18"></div> 
    </div> 
   </div> 
  </div> 


  <div class="full-content-wrapper"> 
   <header id="topbar" role="banner"> 
    <div class="container clearfix"> 
     <a id="logo" href="{{ url('/home/personal') }}" title="饿了么" alt="饿了么" role="logo"> <i class="default-logo"></i> </a> 
     <div class="mobile-wrap"> 
      <a id="topbar_mobile" class="topbar-mobile" href="/mobile" target="_blank" onclick="_gaq.push(['_trackEvent', 'topbar', 'click_mobile']);"><i class="icon-mobile"></i>手机客户端</a> 
      <div id="popup_mobile" class="popup-mobile"> 
       <div class="arrow"></div> 
       <div class="panel"> 
        <p class="title">扫一扫，手机订餐更方便</p> 
        <a class="qrcode" href="mobile.html" target="_blank"><img src="{{ asset('/home/images/app-qrcode-72.png') }}" alt="扫一扫，手机订餐更方便" /></a> 
        <a class="btn-ios" href="http://m.ele.me/download/ios/eleme" target="_blank"><span>App Store下载</span></a> 
        <a class="btn-android" href="http://m.ele.me/download/android/eleme"><span>Android版</span></a> 
       </div> 
      </div> 
     </div> 
     <div id="topbar_search" class="topbar-search" role="search"> 
      <form id="tsearch_form" class="tsearch-form clearfix" action="/search" method="get"> 
       <i class="icon-tsearch"></i> 
       <input id="tsearch_input" class="tsearch-input" type="text" name="kw" autocomplete="off" placeholder="搜索餐厅，美食…" /> 
       <i id="ts_loading" class="icon-tloading hide"></i> 
       <a id="ts_clear" class="icon-tclear hide"></a> 
      </form> 
      <div id="tsearch_autocomplete" class="tsearch-autocomplete"></div> 
     </div> 
     <nav class="topbar-nav" role="navigation"> 
      <ul class="topbar-site-nav"> 

       <li><a class="tnav-link current" rel="nofollow" href="member_order.html">我的饿单</a></li> 
       <li><a class="tnav-link" rel="nofollow" href="gift.html">礼品中心</a></li> 
       <li><a class="tnav-link" rel="nofollow" href="http://t.dianping.com/home?latitude=31.239567&amp;longitude=121.437477&amp;distance=500&amp;utm_source=eleme1&amp;utm_medium=eleme&amp;utm_term=pc&amp;utm_content=1&amp;utm_campaign=f" target="_blank">附近团购</a></li> 
       <li><a class="tnav-link" rel="nofollow" href="support.html">联系客服</a></li> 
       <li><a class="tnav-link" href="{{ url('/home/personal') }}">个人中心</a></li> 
      </ul> 
      <div id="topbar_cart" class="eleme_dropdown topbar-widget topbar-cart"> 
       <a href="javascript:history.go(-1);" class="e_toggle twidget-toggle"> <span id="tcart_total" class="tcart-total twidget-total">1</span> <i class="icon-tcart"></i> </a> 
       <div class="e_dropdown twidget-dropdown"> 
        <div id="tcart_loading" class="twidget-loading"></div> 
        <div id="tcart_wrapper"></div> 
       </div> 
      </div> 
      <div id="topbar_msg" class="eleme_dropdown topbar-widget topbar-msg"> 
       <a class="e_toggle twidget-toggle"> <span id="tmsg_total" class="tmsg-total twidget-total">0</span> <i class="icon-tmsg"></i> </a> 
       <div class="e_dropdown twidget-dropdown"> 
        <div id="tmsg_loading" class="twidget-loading"></div> 
        <div id="tmsg_wrapper"></div> 
       </div> 
      </div> 
      <div class="eleme_dropdown topbar-user-nav"> 
       <a class="e_toggle tnav-link tnav-username" data-id="175519">{{ session('home_user')->name }}<i class="caret"></i></a> 
       <ul class="e_dropdown topbar-user-dropdown"> 
        <li><a rel="nofollow" href="member_index.html"><i class="icon-profile"></i>个人中心</a></li> 
        <li><a rel="nofollow" href="#"><i class="icon-fav"></i>我的收藏</a></li> 
        <li><a rel="nofollow" href="member_addr.html"><i class="icon-address"></i>我的地址</a></li> 
        <li><a rel="nofollow" href="member_safe_set.html"><i class="icon-config"></i>安全设置</a></li> 
        <li class="divider"></li>
        <li><a rel="nofollow" href="/logout"><i class="icon-logout"></i>退出登录</a></li> 
       </ul> 
      </div> 
     </nav> 
    </div> 
   </header> 
   <div class="container">
    <nav class="breadcrumb" data-geohash="wtw3equp"> 
     <a href="/place/-615736186413943440">登科保洁(长寿路店)</a> 
     <a class="breadcrumb-switch" href="{{ url('/') }}">[切换地址]</a> 
    <span class="breadcrumb-divider">/</span> @section('name')
    </nav>
    <div class="wash-paper clearfix" id="profile">
    <nav class="profile-nav"> 
      <ul class="nav nav-list"> 
       <li> <a href="{{ url('/home/order/personal') }}"> <i class="icon-user"></i> 个人中心 </a> </li> 
       <li class="divider"></li> 
       <li class="nav-header">定单中心</li> 
       <li> <a href="{{ url('/home/order/neworder') }}"> <i class="icon-list-alt"></i> 新提交订单 </a> </li> 
       <li> <a href="{{ url('/home/order/handle') }}"> <i class="icon-star-empty"></i> 处理中订单 </a> </li> 
       <li> <a href="{{ url('/home/order/overorder') }}"> <i class="icon-calendar"></i> 已完成订单 </a> </li> 

       <li class="divider"></li> 
       <li class="nav-header">我的收藏</li> 
       <li> <a href="{{ url('/home/shoucang') }}"> <i class="icon-heart"></i> 我收藏的餐厅 </a> </li> 
       <li> <a href="member_collect_food.html"> <i class="icon-star"></i> 我收藏的美食 </a> </li> 
       <li class="divider"></li> 
       <li class="nav-header">账户相关</li> 
       <li> <a href="{{ url('/home/personal/addrindex') }}"> <i class="icon-list"></i> 我的地址 </a> </li> 
       <li> <a href="member_invite.html"> <i class="icon-gift"></i> 邀请好友 <span style="color: #fff; background: red; padding: 0 5px; border-radius: 4px;">HOT</span> </a> </li> 
       <li class="divider"></li> 
       <li class="nav-header">安全中心</li> 
       <li> <a href="{{ url('/home/personal/pwdindex') }}"> <i class="icon-cog"></i> 修改密码 </a> </li> 


       <li> <a href="member_safe_set.html"> <i class="icon-lock"></i> 安全设置 </a> </li> 
       <li class="divider"></li> 
       <li class="nav-header">在线支付</li> 
       <li> <a href="member_schedule.html"> <i class="icon-eye-open"></i> 收支明细 </a> </li> 
      </ul> 
     </nav>

     <div class="main-content"> 
      <div class="content-header"> 

@section('content')
  
  

@show
 
   <footer class="site-footer"> 
    <p class="sfooter-link-list"> <a class="sfooter-link" href="http://kaidian.ele.me">我要开店</a> <a class="sfooter-link" href="contact.html">联系我们</a> <a class="sfooter-link" href="agreement.html">服务条款和协议</a> <a class="sfooter-link" href="sitemaps.html">站点地图</a> <a class="sfooter-link" href="http://jobs.ele.me">加入我们</a> </p> 
    <p> 增值电信业务许可证：<a class="sfooter-link sfooter-link-zero" target="_blank" rel="nofollow" href="http://www.shca.gov.cn">沪B2-20150033</a> <a class="sfooter-link" target="_blank" rel="nofollow" href="http://www.miibeian.gov.cn">沪ICP备 09007032</a> <a class="sfooter-link" target="_blank" rel="nofollow" href="http://www.sgs.gov.cn/lz/licenseLink.do?method=licenceView&amp;entyId=20120305173227823">上海工商行政管理</a> Copyright &copy;2008-2015 ele.me, All Rights Reserved. </p> 
   </footer> 
  </div> 


  <script type="text/javascript">
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
  </script>


@section('js')

@show
</body>
</html>

