<!DOCTYPE html>
<html class="no-js" lang="zh">
 <head> 
  <meta charset="utf-8" /> 
  <title>首页-index.html</title> 
  <meta name="description" content="饿了么是中国最专业的网上订餐平台，提供各类中式、日式、韩式、西式等优质美食。" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <link class="usemin" rel="stylesheet" href="/Home/css/global.48e3a844.css" /> 
  <link class="usemin" rel="stylesheet" href="/Home/css/homepage.8efdfd7c.css" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<style type="text/css">
		html,body{
		    width:100%;
		    height:100%;
		}
		*{
		    margin:0px;
		    padding:0px;
		}
		body, button, input, select, textarea {
		    font: 12px/16px Verdana, Helvetica, Arial, sans-serif;
		}
		p{
		    width:603px;
		    padding-top:3px;
		    overflow:hidden;
		}
		.btn{
		    width:142px;
		}
		#container{
		    min-width:600px;
		    min-height:767px;
		}
	</style>
 <body class="homepage"> 
  <div class="homepage-container"> 
   <header class="homepage-header"> 
    <h1 class="header-logo"><i class="glyph-logo-eleme glyph"></i>叫外卖上饿了么</h1> 
    <div class="header-account"> 
     <a class="link" href="login.html">登录</a> / 
     <a class="link" href="register.html">注册</a> 
    </div> 
   </header> 
   <div class="map-container"> 
    <div id="mask" class="map-mask ui_hide"></div> 
    <div id="guide" class="map-guide ui_hide"> 
     <div class="icon-guide-arrow"></div> 
     <div>
      输入订餐地址，浏览附近餐厅
     </div> 
    </div> 
    <div id="map_wrap" class="map-wrap"></div> 
	
	<!--   定义地图显示容器   -->
	<div id="container"></div>

    <div class="map-block map-tip">
     点击地图直接定位
    </div> 
   </div> 
   <footer class="homepage-footer"> 
    <a class="footer-nav" href="http://ele.me/mobile" target="_blank">手机应用</a> 
    <a class="footer-nav" href="http://kaidian.ele.me" target="_blank">我要开店</a> 
    <a class="footer-nav" href="http://ele.me/links" target="_blank">友情链接</a> 
    <a class="footer-nav" href="http://ele.me/sitemap" target="_blank">网站地图</a> 
   </footer> 
  </div> 
  <script src="http://map.qq.com/api/js?v=2.exp&amp;key=IZIBZ-73ARP-2SPDH-LXOGG-BRP3K-4WFCZ"></script> 
  <script class="usemin" src="/Home/js/homepage_vendor.a799fcfb.js"></script> 
  <script class="usemin" src="/Home/js/homepage.842841e1.js"></script> 
  <script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp"></script>
  	<script>
  		var map new qq.maps.Map(mapContainer, options);
	</script>  
 </body>
</html>