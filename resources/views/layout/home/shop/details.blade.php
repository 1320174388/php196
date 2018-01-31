<!DOCTYPE html>
<html class="no-js" lang="zh">
 <head> 
  <meta charset="utf-8" /> 
  <title>店铺评价</title> 
  <script>
    if(navigator.userAgent.indexOf("MSIE")!=-1 && !window.localStorage){}
  </script> 
  <meta name="csrf-token" content="{{ csrf_token() }}">
@section('css')

@show

 </head> 
 <body id="restaurant"> 
  <header id="topbar" class="site-topbar" role="banner"> 
   <div class="container"> 
    <a class="site-logo" href="http://ele.me" title="饿了么" role="logo">饿了么</a> 
    <div id="topbar_search" class="topbar-search" role="search"> 
     <form id="tsearch_form" class="tsearch-form group" action="http://ele.me/search" method="get"> 
      <i id="icon_tsearch" class="glyph-search"></i> 
      <input id="tsearch_input" class="tsearch-input" type="text" name="kw" autocomplete="off" placeholder="搜索餐厅，美食…" /> 
      <i id="ts_loading" class="icon-tsloading hide"></i> 
      <a id="ts_clear" class="icon-tsclear hide"></a> 
     </form> 
     <div id="tsearch_autocomplete" class="tsearch-autocomplete"></div> 
    </div> 
    <nav class="topbar-nav" role="navigation"> 
     <ul class="topbar-site-nav"> 
      <li><a class="tnav-link" href="http://ele.me/profile/order">我的饿单</a></li> 
      <li><a class="tnav-link" href="gift.html">礼品中心</a></li> 
      <li><a id="tdp_link" class="tnav-link hide" href="http://t.dianping.com" target="_blank">附近团购</a></li> 
      <li><a class="tnav-link" href="{{ url('/home/personal/shoucang') }}">我的收藏</a></li>
      <li><a class="tnav-link" href="{{ url('/home/personal') }}">个人中心</a></li> 
     </ul> 

     <div class="eleme_dropdown topbar-widget topbar-cart empty" height="200px;">
      <a class="e_toggle twidget-toggle"> <span id="tcart_total" class="tcart-total twidget-total">0</span><i class="glyph-cart topbar-glyph"></i></a> 
      <div class="e_dropdown twidget-dropdown" > 
       <div id="tcart_loading" >
          <table id="tcart_loading_table" border="1" cellpadding="5" style="margin:5px auto; color:green;">
            
          </table>
       </div> 
      </div> 
     </div> 


     <div id="topbar_msg" class="eleme_dropdown topbar-widget empty"> 
     
      <div class="e_dropdown twidget-dropdown"> 
       <div id="tmsg_loading" class="twidget-loading"></div> 
       <div id="tmsg_wrapper"></div> 
      </div> 
     </div> 
     <div id="topbar_username" class="eleme_dropdown topbar-user-nav hide"> 
      <a id="t_username" class="e_toggle tnav-link tnav-username caret"></a> 
      <ul class="e_dropdown topbar-user-dropdown"> 
       <li><a class="tuser-link" href="http://ele.me/profile"><i class="glyph-user"></i>个人中心</a></li> 
       <li><a class="tuser-link" href="#"><i class="glyph-fav"></i>我的收藏</a></li> 
       <li><a class="tuser-link" href="http://ele.me/profile/address"><i class="glyph-location"></i>我的地址</a></li> 
       <li><a class="tuser-link" href="http://ele.me/profile/security"><i class="glyph-config"></i>安全设置</a></li> 
       <li class="divider"></li> 
       <li><a id="topbar_logout" class="tuser-link" href="http://ele.me/logout"><i class="glyph-off"></i>退出登录</a></li> 
      </ul>
     </div>
     @if(!session('home_user'))
      <div id="topbar_logreg" class="topbar-user-nav tnav-link"> 
      <a href="login.html">登录</a> / 
      <a href="register.html">注册</a> 
     </div> 
      @else
      <div id="topbar_logreg" class="topbar-user-nav tnav-link"> 
      <a href="">{{ session('home_user')->name }}</a>
      
     </div> 
     @endif
    </nav> 
   </div> 
  </header> 

  @section('content')


  @show

  @section('liebiao')
    <nav class="rst-header-nav"> 
     <div class="inline-block relative"> 
      <span class="rst-header-nav-tip">看图点菜</span> 
      <a class="rst-header-nav-item" href="/kxljmlt-pt/photowall">美食墙</a> 
     </div> 
     <a class="rst-header-nav-item ui_active" href="{{ url('home/shop/comment/.$id') }}">评价</a> 
    </nav> 
  @show


   <div id="mod_fixed" class="global-mod-fixed"> 
   <a id="back_top" class="btn-back-top ui_invisible" role="button" title="回顶部"><i class="icon-backtop"></i></a> 
   <div class="btn-app-qrcode"> 
    <i class="icon-qrcode"></i> 
    <img class="img-qrcode" src="{{ asset('home/images/app-qrcode.20cdda49.png') }}" alt="扫描二维码免费下载手机App" /> 
   </div> 
   <a class="btn-site-feedback" href="http://kaidian.ele.me" target="_blank">我要开店</a> 
   <a class="btn-site-feedback" href="help.html" target="_blank">热门问题</a> 
   <!-- Live800在线客服图标:在线客服[文本图标] 开始--> 
   <div style="display:none;">
    <a href="http://www.live800.com">在线聊天</a>
   </div> 
   <script language="javascript" src="{{ asset('home/js/textButton.js?jid=1820947377&amp;companyID=402791&amp;configID=123801&amp;codeType=custom') }}"></script> 
   <!-- 在线客服图标:在线客服 结束--> 
  </div> 
  <footer class="site-footer group" role="contentinfo"> 
   <div class="container"> 
    <p class="sfooter-line"> <a class="sfooter-link" href="http://kaidian.ele.me">我要开店</a> | <a class="sfooter-link" href="contact.html">联系我们</a> | <a class="sfooter-link" href="http://ele.me/about/agreement">服务条款和协议</a> | <a class="sfooter-link" href="sitemaps.html">站点地图</a> | <a class="sfooter-link" href="http://ele.me/jobs">加入我们</a> </p> 
    <p class="sfooter-line"> 增值电信业务许可证：<a class="sfooter-link sfooter-link-zero" target="_blank" rel="nofollow" href="http://www.shca.gov.cn">沪B2-20150033</a> <a class="sfooter-link" target="_blank" rel="nofollow" href="http://www.miibeian.gov.cn">沪ICP备 09007032</a> <a class="sfooter-link" target="_blank" rel="nofollow" href="http://www.sgs.gov.cn/lz/licenseLink.do?method=licenceView&amp;entyId=20120305173227823">上海工商行政管理</a> Copyright &copy;2008-2015 ele.me, All Rights Reserved. </p> 
   </div> 
  </footer> 
  <script class="usemin" src="{{ asset('home/js/vendor.7aa05b99.js') }}"></script> 
  <script class="usemin" src="{{ asset('home/js/global.8d3089f1.js') }}"></script> 
  <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script',('http://static11.elemecdn.com')+'/forward/js/vendor/analytics.js','ga');

      ga('create','UA-2513347-3',{'cookieDomain':'.ele.me'});
      ga('send','pageview','restaurant_rating/all/kxljmlt-pt');
      
      var isReady = false,
          readyList = null;
      function domReady(callback) {
        if (isReady) {
          setTimeout(callback);
          return;
        }

        if (readyList) {
          readyList.push(callback);
          return;
        }

        readyList = [callback];
        var completed = function(event) {
          if (document.addEventListener || event.type == 'load' || document.readyState === 'complete') {
            detach();
            realReady();
          }
        };

        if (document.addEventListener) {
          document.addEventListener('DOMContentLoaded', completed, false);
          window.addEventListener('load', completed, false);
        } else {
          document.attachEvent('onreadystatechange', completed);
          window.attachEvent('onload', completed);

          var top = false;
          try {
            top = window.frameElement == null && document.documentElement;
          } catch(e) {}

          if (top && top.doScroll) {
            (function doScrollCheck() {
              if (!isReady) {
                try {
                  top.doScroll('left');
                } catch(e) {
                  return setTimeout(doScrollCheck, 50);
                }
                detach();
                realReady();
              }
            })();
          }
        }

        function detach() {
          if (document.addEventListener) {
            document.removeEventListener('DOMContentLoaded', completed, false);
            window.removeEventListener('load', completed, false);
          } else {
            document.detachEvent('onreadystatechange', completed);
            window.detachEvent('onload', completed);
          }
        }

        function realReady() {
          if (!document.body) {
            setTimeout(realReady);
            return;
          }
          isReady = true;
          var callback;
          while (callback = readyList.shift()) {
            callback();
          }
        }
      }
      domReady(function(){
        readyTime = new Date().getTime() - startTime;
        if(readyTime < 10000 && readyTime > 0){
          ga('send', 'event', 'ReadyTime', ELEME.route, '', readyTime);
        }
      });
    </script> 
  <!-- UBT --> 
  <script>
    UBT.send('PV', {
      resolution: window.screen ? screen.width + 'x' + screen.height : null,
      location: location.href,
      referrer: document.referrer
    });
    </script> 
  <!-- fingerprint --> 
  <script>
    // fingerprint
    void function() {
      // 已存在 fingerprint 则不做处理
      var fingerprint = document.cookie.match(/(?:^|; )track_fingerprint_1=(.*?)(?:; |$)|$/)[1];
      if(fingerprint) return;
      // 发送 fingerprint data
      var fin = new Fingerprint();
      var data = fin.get();
      var track_id = document.cookie.match(/(?:^|; )track_id=(.*?)(?:; |$)|$/)[1];
      var xhr = !-[1,] ? new XDomainRequest() : new XMLHttpRequest();
      xhr.open('POST', '//restapi.ele.me/v1/browser_fingerprints', true);
      var package = { track_id: track_id, json_string: JSON.stringify(data) };
      xhr.send(JSON.stringify(package));
      // 计算 fingerprint 种下 cookie
      var fingerprint = fin.murmurhash3_32_gc(JSON.stringify(package), 31);
      var domain = document.domain.match(/[\w-]+\.?[\w-]+$/)[0];
      document.cookie = 'track_fingerprint_1=' + fingerprint + '; Expires=Wed, 31 Dec 2098 16:00:00 GMT; Domain=' + domain + '; Path=/';
    }();
    </script> 
  <script class="usemin" src="{{ asset('home/js/rstRating.dbe5ad9c.js') }}"></script> 
  <script type="text/javascript" src="{{ asset('bs/js/jquery.min.js') }}"></script> 
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