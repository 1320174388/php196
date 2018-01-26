@extends('layout.home.shop.shop')
@section('content')

  <script>
    if(navigator.userAgent.indexOf("MSIE")!=-1 && !window.localStorage){}
  </script> 
  <link class="usemin" rel="stylesheet" href="/home/shop/css/global.2730d877.css" /> 
  <link class="usemin" rel="stylesheet" href="/home/shop/css/restaurant.92731b91.css" /> 
  <script class="usemin" src="/home/shop/js/cdn_detect.66c19641.js"></script> 
  <script>
    if(!window.CDNReady){var d=new Date;d.setHours(d.getHours()+6);document.cookie='CDNDown=1; domain=v5.ele.me; expires='+d.toUTCString()+'; path=/';if(!window.localStorage.getItem('CDNBackup')){window.localStorage.setItem('CDNBackup',1);location.reload(true)}}
  </script> 
  <script class="usemin" src="/home/shop/js/modernizr.custom.min.f49cdc05.js"></script> 
  <script type="text/javascript" src="{{ asset('/home/spigPet/js/jquery-3.2.1.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/layer/layer.js') }}"></script>
<!-- //res.layui.com/layui/dist/css/layui.css -->
 <body id="restaurant"> 

  <div class="restaurant-header"> 
   <div class="container rst_header_con"> 
    <article class="rst-header-main rst-header-toggle rst_info_header" itemscope="" itemtype="http://schema.org/Restaurant"> 
     <header class="rst-header-info group"> 
      <a class="rst-logo" href="" itemprop="url"> <img class="rst-logo-img" srcset="" alt="云窗小语" itemprop="logo" /> <i class="icon-rst-badge v v-person" title="该商家已通过个人身份认证"></i> </a> 
      <div class="rst-basic-info"> 
       <div class="rst-name-wrapper "> 
        <a class="rst-name text-overflow" href="#" data-toggle="bs-tooltip" title="弄啥" itemprop="name">云窗小语</a> 
       </div> 
       <div class="rst-misc"> 
        <a id="rst_rating" class="rst-rating" href="/home/shop//bsycxy/rating"> <span class="rating-stars"> <i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star off">★</i></span> 4.2 </a> 
        <span class="rst-status">休息中</span> 
       </div> 
      </div> 
     </header> 
     <div class="rst-header-detail rst-header-dropdown"> 
      <section class="rst-header-rating group"> 
       <div class="rating-point header" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating"> 
        <a class="point"><span itemprop="ratingValue">4.2</span></a> 
        <a class="comment" href="/home/shop//bsycxy/rating"><span itemprop="reviewCount">22</span>人评价</a> 
       </div> 
       <ul class="rating-diagram header"> 
        <li class="diagram-item"> <span class="rating-stars"> <i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i></span> <span class="bar" style="width: 70.4px;"></span> 64% </li> 
        <li class="diagram-item"> <span class="rating-stars"> <i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star off">★</i></span> <span class="bar" style="width: 9.9px;"></span> 9% </li> 
        <li class="diagram-item"> <span class="rating-stars"> <i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star off">★</i><i class="glyph-rating-star off">★</i></span> <span class="bar" style="width: 15.4px;"></span> 14% </li> 
        <li class="diagram-item"> <span class="rating-stars"> <i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star off">★</i><i class="glyph-rating-star off">★</i><i class="glyph-rating-star off">★</i></span> <span class="bar" style="width: 15.4px;"></span> 14% </li> 
        <li class="diagram-item"> <span class="rating-stars"> <i class="glyph-rating-star">★</i><i class="glyph-rating-star off">★</i><i class="glyph-rating-star off">★</i><i class="glyph-rating-star off">★</i><i class="glyph-rating-star off">★</i></span> <span class="bar" style="width: 0px;"></span> 0% </li> 
       </ul> 
      </section> 
      <section class="rst-header-intro">
       本店已加盟饿了么网上订餐，叫外卖，上饿了么！
      </section> 
      <ul class="rst-header-list"> 
       <li><span class="item">时间：</span>10:00 - 22:00</li> 
       <li><span class="item">地址：</span><span itemprop="address">保山学院后门小吃街</span></li> 
      </ul> 
     </div> 
    </article> 
    <nav class="rst-header-nav"> 
     <a class="rst-header-nav-item" href="/home/shop//bsycxy">菜单</a> 
     <div class="inline-block relative"> 
      <span class="rst-header-nav-tip">看图点菜</span> 
      <a class="rst-header-nav-item ui_active" href="/home/shop//bsycxy/photowall">美食墙</a> 
     </div> 
     <a class="rst-header-nav-item" href="/home/shop//bsycxy/rating">评价</a> 
     <a class="rst-header-nav-item" href="/home/shop//bsycxy/comment">留言</a> 
    </nav> 
    <ul class="rst-header-aside group rst_info_panel"> 
     <li class="rst-data-block"> 
      <div class="rst-data no-border"> 
       <b class="rst-data-info value">26</b> 
       <span class="rst-data-info unit">速度/分钟</span> 
      </div> </li> 
     <li class="rst-data-block rst-header-toggle rst_head_distance"> 
      <div class="rst-data caret"> 
       <b class="rst-data-info value rst_distance"></b> 
       <span class="rst-data-info unit">餐厅距离/米</span> 
      </div> 
      <div class="rst-header-dropdown"> 
       <div class="rst-header-map rst-data-detail"> 
        <img class="rst_map rst-map-img" alt="餐厅距离示意图" /> 
       </div> 
      </div> </li> 
     <li class="rst-data-block"> 
      <div class="rst-data"> 
       <b class="rst-data-info value rst_deliver_amount"></b> 
       <span class="rst-data-info unit">起送价/元</span> 
      </div> </li> 
    </ul> 
    <div class="rst-fav-wrapper"> 
     <div id="rst_fav" class="rst-block rst-fav"> 
      <i class="glyph">♥</i> 
      <span class="status" data-unfaved="收藏 餐厅" data-faved="已收藏">收藏 餐厅</span> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="wall_wrap" class="container"> 
   <div id="fixed_placeholder" class="rst-subnav-placeholder"> 
    <div id="sub_nav" class="rst-block rst-subnav-wrapper full-width group"> 
     <a class="rst-subnav sort_btn ui_active" data-method="like">图片最赞</a> 
     <a class="rst-subnav sort_btn" data-method="sales">销量最高</a> 
     <a class="rst-subnav sort_btn" data-method="rating">评价最好</a> 
     <a class="rst-subnav sort_btn" data-method="price">价格最低</a> 
     <div class="photo-guide-panel photo-wall"> 
      <div class="rst-subnav photo-guide-toggle">
       <i class="icon-photoman"></i>
       <span class="text">拍照片拿积分</span>
      </div> 
      <div class="photo-guide-dropdown"> 
       <div class="photo-guide-wrapper group"> 
        <div class="photo-guide"> 
         <img src="/home/shop/images/photo-guide.1c780890.png" alt="流程" /> 
         <ol class="photo-guide-flow group"> 
          <li class="step step1">下单收到外卖打开手机应用</li> 
          <li class="step step2">用「美食相机」拍照<span class="highlight">赚20积分</span></li> 
         </ol> 
        </div> 
        <div class="photo-guide-qr"> 
         <img src="/home/shop/images/app-qrcode.20cdda49.png" alt="http://m.ele.me/dapp" /> 
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 

   <div id="food_wrap" class="photo-wall group"> 
    @foreach( $food as $k=>$v)
    <div id="wall_view_9957939" class="rst-block album-block eleme_view">
     <a href="javascript:;" class="album-cover food_cover"> 

     <img data-id="{{ $v->id }}" class="images_shop album-cover-img food_img" src="{{ asset('/shopUploads/'.$v->img) }}"/> </a> 
     
     <a class="dish-favor favor_btn" title="收藏">♥</a> 
     <a class="photo-like like_btn" title="给这张图片点赞"> 赞<span class="photo-like-count like_count ui_hide">0</span> </a> 
     <div class="album-dish"> 
      <div class="album-dish-name food_name" title="{{ $v->name }}" >
       {{ $v->name }}
      </div> 
      <div class="album-dish-rating"> 
       <i class="icon-d-star s0"></i>
      </div>
      <div class="album-dish-sale">
       <img class="icon-rst-badge" src="{{ asset('/shopUploads/'.$v->img) }}" title="" alt="" />月售20份
      </div>
      <div class="rst-d-action r_d_a">
       <div class="unavailable symbol-rmb">
         {{ $v->price }}
        <br />
        <span class="status">营业</span>
       </div>
      </div>
     </div>
    </div>
    @endforeach
  </div>  
  <div style="float:right;">
    {!! $food->render() !!}
  </div>

  <div id="modal_photo" class="bs-modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false"> 
   <div class="bs-modal-dialog rst-photo-modal"> 
    <div class="bs-modal-content"> 
     <div class="bs-modal-header group food_info_wrap"> 
      <a class="bs-close" data-dismiss="bs-modal" aria-hidden="true">&times;</a> 
     </div> 
     <div class="bs-modal-body"> 
      <div class="photo-block-wrapper photo_list"></div> 
      <div class="rst-block photo-wall-loading load_more ui_hide">
       正在加载更多…
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 

  <div id="modal_iLogin" class="bs-modal fade ilogin-modal" tabindex="-1" role="dialog" aria-hidden="true"> 
   <div class="bs-modal-dialog"> 
    <div class="bs-modal-content"> 
     <div class="bs-modal-body"> 
      <a class="bs-close" data-dismiss="bs-modal" aria-hidden="true">&times;</a> 
     </div> 
    </div> 
   </div> 
  </div> 

  <script>
    // var wallFoods = [{"rating": 0, "description": "\u5927\u9505\u3001\u914d\u9c7c\u3001\u767d\u83dc\u3001\u9171\u3001\u6d0b\u828b\u3001\u7c89\u6761\u3001\u767d\u8c46\u8150\u3001\u6ce1\u6912\u300120\u5143\u6bcf\u65a4\u3001\u7ecf\u6d4e\u5b9e\u6075\uff01", "restaurant_id": 120275, "sales": 2, "num_ratings": [0, 0, 0, 0, 0], "ratingCount": 0, "id": 9957939, "count": 1, "cover_update": 1417595023, "name": "\u9178\u8fa3\u5927\u9505\u9c7c", "cover": {"image": "/9/63/0a26c19f5de3605c9b82b41206ddfjpeg.jpeg", "like_count": 0, "id": 2311762}, "activity": {"categ": "\u95ea\u7535\u7ea2\u5305", "mustNewUser": 0, "description": "\u5728\u7ebf\u652f\u4ed8\u6765\u5206\u4eab\uff0c\u997f\u4e86\u4e481\u4ebf\u7ea2\u5305\u91cd\u78c5\u6765\u88ad", "activityIcons": [{"url": "/d/1a/d016d4bae7764d14ad6786b549a4agif.gif", "desc": "\u5728\u7ebf\u652f\u4ed8\u6765\u5206\u4eab\uff0c\u997f\u4e86\u4e481\u4ebf\u7ea2\u5305\u91cd\u78c5\u6765\u88ad"}], "mustPayOnline": 0, "categId": "activity_14337", "isActivity": true, "activityImages": ["/b/0f/75678d1115f97b583b945607b81a5gif.gif"]}, "attributes": [], "price": 20.0, "stock": 9890}, {"rating": 0, "description": "\u914d\u6599\uff1a\u9c9c\u9e21\u811a\u3001\u9ec4\u74dc\u3001\u7ea2\u841d\u535c\u3001\u5c0f\u7c73\u8fa3\u3001\u67e0\u6aac\u3002\u5473\u8fa3\u9178\u6e05\u9999\u3001\u53e3\u611f\u6e05\u8106\uff0c\u4e0b\u9152\u795e\u5668\u3002", "restaurant_id": 120275, "sales": 8, "num_ratings": [0, 0, 0, 0, 0], "ratingCount": 0, "id": 9898522, "count": 1, "cover_update": 1417161431, "name": "\u8202\u9e21\u811a", "cover": {"image": "/9/48/800784951c1aafc91d9d1b169d55bjpeg.jpeg", "like_count": 0, "id": 2207326}, "activity": {"categ": "\u95ea\u7535\u7ea2\u5305", "mustNewUser": 0, "description": "\u5728\u7ebf\u652f\u4ed8\u6765\u5206\u4eab\uff0c\u997f\u4e86\u4e481\u4ebf\u7ea2\u5305\u91cd\u78c5\u6765\u88ad", "activityIcons": [{"url": "/d/1a/d016d4bae7764d14ad6786b549a4agif.gif", "desc": "\u5728\u7ebf\u652f\u4ed8\u6765\u5206\u4eab\uff0c\u997f\u4e86\u4e481\u4ebf\u7ea2\u5305\u91cd\u78c5\u6765\u88ad"}], "mustPayOnline": 0, "categId": "activity_14337", "isActivity": true, "activityImages": ["/b/0f/75678d1115f97b583b945607b81a5gif.gif"]}, "attributes": [], "price": 20.0, "stock": 9951}, {"rating": 0, "description": "\u914d\u79d8\u5236\u9171\u6599\u3001\u97ed\u83dc\u3001\u767d\u83dc\u3001\u9999\u80a0\u3001\u9c9c\u9762\u716e\u719f\u3001\u7206\u7092\u4e0a\u76d8\u5373\u53ef\u3002\u9171\u5473\u97ed\u83dc\u9999\u5473\u3001\u9999\u6ed1\u723d\u53e3\u3002", "restaurant_id": 120275, "sales": 22, "num_ratings": [0, 0, 0, 0, 0], "ratingCount": 0, "id": 9898520, "count": 1, "cover_update": 1420434634, "name": "\u7092\u9762", "cover": {"image": "/7/33/4b5a5d59621493e0b2e1a3c4780acjpeg.jpeg", "like_count": 0, "id": 3214192}, "activity": {"categ": "\u95ea\u7535\u7ea2\u5305", "mustNewUser": 0, "description": "\u5728\u7ebf\u652f\u4ed8\u6765\u5206\u4eab\uff0c\u997f\u4e86\u4e481\u4ebf\u7ea2\u5305\u91cd\u78c5\u6765\u88ad", "activityIcons": [{"url": "/d/1a/d016d4bae7764d14ad6786b549a4agif.gif", "desc": "\u5728\u7ebf\u652f\u4ed8\u6765\u5206\u4eab\uff0c\u997f\u4e86\u4e481\u4ebf\u7ea2\u5305\u91cd\u78c5\u6765\u88ad"}], "mustPayOnline": 0, "categId": "activity_14337", "isActivity": true, "activityImages": ["/b/0f/75678d1115f97b583b945607b81a5gif.gif"]}, "attributes": [], "price": 10.0, "stock": 9788}, {"rating": 0, "description": "\u592a\u8fa3\u3001\u6700\u8fa3\u3001\u60f3\u53d1\u706b\uff01", "restaurant_id": 120275, "sales": 27, "num_ratings": [0, 0, 0, 0, 0], "ratingCount": 0, "id": 12859410, "count": 2, "cover_update": 1420541256, "name": "\u5c0f\u7c73\u8fa3\u725b\u8089\u7092\u996d", "cover": {"image": "/5/d5/90eac2d6fd42309e1d67b82b5ca58jpeg.jpeg", "like_count": 0, "id": 3275155}, "attributes": [], "price": 10.0, "stock": 9859}, {"rating": 5.0, "description": "\u7d20\u98df\uff0c\u914d\u6599\u9999\u83c7\u3001\u897f\u7ea2\u67ff\u3001\u8c46\u8fa8\u9171\u3001\u6d0b\u8471\uff0c\u9171\u9999\u6d53\u5473\u751c\u3001\u914d\u9178\u6ce1\u83dc\uff0c\u53ef\u4ee5\u4e00\u54c1\u3002", "restaurant_id": 120275, "sales": 45, "num_ratings": [0, 0, 0, 0, 1], "ratingCount": 1, "id": 9898519, "count": 3, "cover_update": 1420359848, "name": "\u70b8\u9171\u9762", "cover": {"image": "/3/0b/8024da3ffe5cc0b4306a5bad2cae8jpeg.jpeg", "like_count": 0, "id": 3180978}, "activity": {"categ": "\u95ea\u7535\u7ea2\u5305", "mustNewUser": 0, "description": "\u5728\u7ebf\u652f\u4ed8\u6765\u5206\u4eab\uff0c\u997f\u4e86\u4e481\u4ebf\u7ea2\u5305\u91cd\u78c5\u6765\u88ad", "activityIcons": [{"url": "/d/1a/d016d4bae7764d14ad6786b549a4agif.gif", "desc": "\u5728\u7ebf\u652f\u4ed8\u6765\u5206\u4eab\uff0c\u997f\u4e86\u4e481\u4ebf\u7ea2\u5305\u91cd\u78c5\u6765\u88ad"}], "mustPayOnline": 0, "categId": "activity_14337", "isActivity": true, "activityImages": ["/b/0f/75678d1115f97b583b945607b81a5gif.gif"]}, "attributes": [], "price": 6.0, "stock": 9581}, {"rating": 0, "description": "\u65e0\u8fa3\u5473\u3001\u725b\u5e72\u5df4\u914d\u9752\u83dc\uff0c\u6709\u70b9\u602a\uff01", "restaurant_id": 120275, "sales": 2, "num_ratings": [0, 0, 0, 0, 0], "ratingCount": 0, "id": 9940374, "count": 2, "cover_update": 1420196696, "name": "\u725b\u5e72\u5df4\u9752\u83dc\u7092\u996d", "cover": {"image": "/1/e9/70723d40c4ee35346038128bf7240jpeg.jpeg", "like_count": 0, "id": 3120050}, "attributes": [], "price": 10.0, "stock": 9881}, {"rating": 3.0, "description": "\u914d\u6599\uff1a\u706b\u817f\u8089\u3001\u6d0b\u828b\u3001\u7ea2\u841d\u535c\u3001\u9c9c\u83dc\u3001\u9999\u80a0\u3001\u706b\u817f\u80a0\u3002\u814a\u8089\u5473\u9999\u6d53\u3001\u914d\u6ce1\u83dc\u3001\u4e0b\u996d\uff01", "restaurant_id": 120275, "sales": 70, "num_ratings": [0, 0, 1, 0, 0], "ratingCount": 1, "id": 9898521, "count": 2, "cover_update": 1420606838, "name": "\u7802\u9505\u996d", "cover": {"image": "/b/8f/b10dcc0b07451e9e5107461c2eaffjpeg.jpeg", "like_count": 0, "id": 3301578}, "activity": {"categ": "\u95ea\u7535\u7ea2\u5305", "mustNewUser": 0, "description": "\u5728\u7ebf\u652f\u4ed8\u6765\u5206\u4eab\uff0c\u997f\u4e86\u4e481\u4ebf\u7ea2\u5305\u91cd\u78c5\u6765\u88ad", "activityIcons": [{"url": "/d/1a/d016d4bae7764d14ad6786b549a4agif.gif", "desc": "\u5728\u7ebf\u652f\u4ed8\u6765\u5206\u4eab\uff0c\u997f\u4e86\u4e481\u4ebf\u7ea2\u5305\u91cd\u78c5\u6765\u88ad"}], "mustPayOnline": 0, "categId": "activity_14337", "isActivity": true, "activityImages": ["/b/0f/75678d1115f97b583b945607b81a5gif.gif"]}, "attributes": [], "price": 12.0, "stock": 9927}, {"rating": 4.5, "description": "\u7ea2\u70e7\u725b\u8089\u3001\u4e0d\u8fa3\u3001\u914d\u897f\u7ea2\u67ff\u3001\u8471\u6cac\u3001\u9ad8\u6c64\u52fa\u6b20\u3002", "restaurant_id": 120275, "sales": 83, "num_ratings": [0, 0, 0, 1, 1], "ratingCount": 2, "id": 9940099, "count": 2, "cover_update": 1419506496, "name": "\u7ea2\u70e7\u725b\u8089\u76d6\u996d", "cover": {"image": "/0/23/07bb9e1879d42ba3cdf3ef39d3441jpeg.jpeg", "like_count": 0, "id": 2891993}, "attributes": [], "price": 10.0, "stock": 9352}];
    // var wallRenderIndex = 7;
  </script> 



  <script class="usemin" src="/home/shop/js/vendor.7aa05b99.js"></script>
  <script class="usemin" src="/home/shop/js/global.8d3089f1.js"></script> 
  <script>

      var images_shop = $('.images_shop').on('click',function(){  
          var food_id = $(this).attr('data-id');

          @if(session('home_user'))
            var user_id = {{ session('home_user')->id }};
          @else
            var user_id = 0;
          @endif

          $.ajax({
            url:"{{ url('/home/shop/details') }}",
            type:'post',
            data:{ 'food_id':food_id,'user_id':user_id,'_token':"{{ csrf_token() }}"},
            success:function(data){
              console.log(data);
              if(data == 0 ){
                layer.msg('请先去登录');
                setTimeout(function(){
                  location.replace('{{ url("login") }}');
                },3000);
              }else{

                $('.glyph-cart').removeClass('topbar-glyph');
                $('.glyph-cart').text(data.arr.length);
                layer.msg('以加入购物车');

                $('#tcart_loading_table').empty();

                $('#tcart_loading_table').append('<tr><th>食品</th><th>数量</th><th>价格</th><th>操作</th></tr>');

                $.each(data.arr,function(i,n){
                  $('#tcart_loading_table').append('<tr trvalue="'+n.food_id+'"><td class="td_food_id">'+n.name+'</td><td>'+n.number+'</td><td class="td_food_id">'+n.price+'</td><td><a class="button_food_add" food_add="'+n.food_id+'">添加 </a><a class="button_food_del" food_del="'+n.food_id+'"> 删除</a></td></tr>');
                });
                $('#tcart_loading_table').append('<tr><td>总价格：</td><td>'+data.num+'</td><td>去结算：</td><td><a href="">结算</a></td></tr>');
                burron_food_add();
                function burron_food_add(){
                  $('.button_food_add').on('click',function(e){

                      var food_id = $(this).attr('food_add');
                      var tr = $(this).parent().parent();
                      $.ajax({
                        url:"{{ url('/home/shop/addfood') }}",
                        type:'post',
                        data:{ 'food_id':food_id,'user_id':user_id,'_token':"{{ csrf_token() }}"},
                        success:function(data){
                          layer.msg('添加成功');
                          $('#tcart_loading_table').empty();
                          $('#tcart_loading_table').append('<tr><th>食品</th><th>数量</th><th>价格</th><th>操作</th></tr>');
                          $.each(data.arr,function(i,n){
                            $('#tcart_loading_table').append('<tr trvalue="'+n.food_id+'"><td class="td_food_id">'+n.name+'</td><td>'+n.number+'</td><td class="td_food_id">'+n.price+'</td><td><a class="button_food_add" food_add="'+n.food_id+'">添加 </a><a class="button_food_del" food_del="'+n.food_id+'"> 删除</a></td></tr>');
                          });
                          $('#tcart_loading_table').append('<tr><td>总价格：</td><td>'+data.num+'</td><td>去结算：</td><td><a href="">结算</a></td></tr>');

                          burron_food_add();
                          button_food_del();
                        },
                        dataType:'json'
                      });
                  });
                }
                button_food_del();
                function button_food_del(){
                  $('.button_food_del').on('click',function(e){

                      var food_id = $(this).attr('food_del');
                      var tr = $(this).parent().parent();
                      $.ajax({
                        url:"{{ url('/home/shop/delfood') }}",
                        type:'post',
                        data:{ 'food_id':food_id,'user_id':user_id,'_token':"{{ csrf_token() }}"},
                        success:function(data){
                          layer.msg('删除成功');
                          $('#tcart_loading_table').empty();
                          $('#tcart_loading_table').append('<tr><th>食品</th><th>数量</th><th>价格</th><th>操作</th></tr>');
                          $.each(data.arr,function(i,n){
                            $('#tcart_loading_table').append('<tr trvalue="'+n.food_id+'"><td class="td_food_id">'+n.name+'</td><td>'+n.number+'</td><td class="td_food_id">'+n.price+'</td><td><a class="button_food_add" food_add="'+n.food_id+'">添加 </a><a class="button_food_del" food_del="'+n.food_id+'"> 删除</a></td></tr>');
                          });
                          $('#tcart_loading_table').append('<tr><td>总价格：</td><td>'+data.num+'</td><td>去结算：</td><td><a href="">结算</a></td></tr>');
                          button_food_del();
                          burron_food_add();
                          if(data == 1){
                            $('.glyph-cart').text('');
                            $('.glyph-cart').addClass('topbar-glyph');
                            $('#tcart_loading_table').empty();
                          }
                        },
                        dataType:'json'
                      });
                  });
                }

              }
            },
            dataType:'json'
          });
      });
      

            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script',('http://static11.elemecdn.com')+'/forward/js/vendor/analytics.js','ga');

      ga('create','UA-2513347-3',{'cookieDomain':'.ele.me'});
      ga('send','pageview','restaurant_photo_wall/bsycxy');
      
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
@endsection