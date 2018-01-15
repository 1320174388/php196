<!DOCTYPE html>
<html class="no-js" lang="zh">
 <head> 
  <meta charset="utf-8" /> 
  <title>首页-index.html</title> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
  <meta name="description" content="饿了么是中国最专业的网上订餐平台，提供各类中式、日式、韩式、西式等优质美食。" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <link class="usemin" rel="stylesheet" href="/Home/css/global.48e3a844.css" /> 
  <link class="usemin" rel="stylesheet" href="/Home/css/homepage.8efdfd7c.css" />
  <script type="text/javascript" src="/home/js/jquery-1.8.3.min.js"></script>
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
    #container{
        min-width:600px;
        min-height:767px;
    }
    .btn{
        width:142px;
    }
  </style>
 <body class="homepage"> 
  <div class="homepage-container"> 
   <header class="homepage-header"> 
    <h1 class="header-logo"><i class="glyph-logo-eleme glyph"></i>php196,外卖系统</h1> 
    <div class="header-account"> 
     <a class="link" href="{{ url('login') }}">登录</a> / 
     <a class="link" href="{{ url('register') }}">注册</a> 
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
    
    <div  id="container" id="map_wrap" class="map-wrap"></div> 
    <div class="map-navbar group">
     <div id="city_section" class="bs-dropdown module-city">
      <select id="selecte_1" class="address_option city_label bs-dropdown-toggle map-block dark city-toggle caret" data-toggle="bs-dropdown">
        <option value="0">北京</option>
        <option value="1">上海</option>
        <option value="2">广东</option>
        <option value="3">深圳</option>
      </select>
      <select id="selecte_2" class="address_option city_label bs-dropdown-toggle map-block dark city-toggle caret" data-toggle="bs-dropdown">
        <option value="0">北京市</option>
        <option value="1">上海市</option>
      </select>
      <select id="selecte_3" class="address_option city_label bs-dropdown-toggle map-block dark city-toggle caret" data-toggle="bs-dropdown">
        <option value="0">昌平区</option>
        <option value="1">朝阳区</option>
      </select>
     </div>
     <div class="module-locate map_search"> 
      <div class="map-block dark search-bar group"> 
       <input id="address" class="search-input" type="search" placeholder="请输入你的订餐地址（学校，写字楼或街道）" /> 
       <a class="glyph-search search-btn search_btn" onclick="codeAddress()" role="button"></a> 
      </div> 
     </div> 
     <div id="entry" class="map-block module-locate module-entry ui_hide"> 
      <h3 class="module-header">请选择区域</h3> 
      <div class="entries_box"></div> 
     </div> 
    </div> 
    <div class="map-sidebar"> 
     <div class="map-block module-result result_wrap ui_hide"> 
      <div class="result-loading search_loader"> 
       <i class="icon-eleme-loader"></i> 
       <p class="hint">搜索中……</p> 
      </div> 
      <div class="result-wrapper result_container ui_hide"> 
       <h3 class="module-header">共<span class="highlight addr_amount"></span>地址</h3> 
       <div class="result-list search_results"> 
        <div class="result-pager result_pagination"></div> 
       </div> 
      </div> 
     </div> 
    </div> 
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
  <script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp"></script>
    <script>
      var lat = null;
      var lng = null;
      var geocoder,map,marker = null;
      var init = function(event) {
          var map = new qq.maps.Map(document.getElementById("container"),{
              center: new qq.maps.LatLng(40.220573,116.233574),
              draggableCursor : '{{ url("/img/Arrow.cur") }}',//设置鼠标拖拽元素样式
              draggingCursor : '{{ url("/img/SizeAll.cur") }}',//设置鼠标移动样式
              zoom: 30
          });
          var scaleControl = new qq.maps.ScaleControl({
              align: qq.maps.ALIGN.BOTTOM_LEFT,
              margin: qq.maps.Size(85, 15),
              map: map
          });

          var anchor = new qq.maps.Point(49,82),
            size = new qq.maps.Size(100,87),
            origin = new qq.maps.Point(0, 0),
            icon = new qq.maps.MarkerImage(
                "{{ url('img/car.gif') }}",
                size,
                origin,
                anchor
            );

          //添加监听事件   获取鼠标单击事件
          qq.maps.event.addListener(map, 'click', function(event) {
            var marker=new qq.maps.Marker({
              position:event.latLng, 
              map:map,
              animation: qq.maps.MarkerAnimation.BOUNCE,
              title:'点击购物'
            });
            marker.setIcon(icon);  
            qq.maps.event.addListener(map, 'click', function(event) {
                marker.setMap(null);      
            });

            lat = event.latLng.lat;
            lng = event.latLng.lng;
            geocoder.getAddress(event.latLng);
          });

          //调用地址解析类
          geocoder = new qq.maps.Geocoder({
              complete : function(result){
                map.setCenter(result.detail.location);
                //添加到提示窗
                var info = new qq.maps.InfoWindow({
                    map: map
                });
              }
          });
      }

      var sel_1 = $('selecte_1').val();
      var sel_2 = $('selecte_1').val();
      var sel_3 = $('selecte_1').val();

      function codeAddress(addr) {
          var address = document.getElementById("address").value;
          if(addr){
            address = addr;
          }
          //通过getLocation();方法获取位置信息值
          geocoder.getLocation(sel_1+'-'+sel_2+'-'+sel_3+address);
      }

      //异步加载地图库函数文件
      function loadScript() {
        //创建script标签
        var script = document.createElement("script");
        //设置标签的type属性
        script.type = "text/javascript";
        //设置标签的链接地址
        script.src = "http://map.qq.com/api/js?v=2.exp&callback=init";
        //添加标签到dom
        document.body.appendChild(script);
      }
        
      window.onload = loadScript; // dom文档加载结束开始加载 此段代码
      $('.address_option').on('change',function(){
          var val = $(this).val(); // 获取select选择的val值
          var addr = $(this).children().eq(val).text(); // 获取当前option内容
          sel_1 = $('selecte_1').val();
          sel_2 = $('selecte_1').val();
          sel_3 = $('selecte_1').val();
          geocoder.getLocation();
      });

  </script>
 </body>
</html>