@extends('layout.home.shop.details')
@section('css')
  <link class="usemin" rel="stylesheet" href="{{ asset('home/css/global.2730d877.css') }}" /> 
  <link class="usemin" rel="stylesheet" href="{{ asset('home/css/restaurant.92731b91.css') }}" />


  <style>
  #btn {
    background-color: #f44336;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 10px;
    font-size: 9px;
  }
  #ul li {
  float: left;
  list-style: none;
  width: 27px;
  height: 27px;
  background: url({{ asset('/home/images/2016060910202011.gif') }})
  }
  #ul li a {
  display: block;
  width: 100%;
  padding-top: 27px;
  overflow: hidden;
  }
  #ul li.light {
  background-position: 0 -29px;
  }
  
  </style>
  
@stop

@section('content')
  <div class="restaurant-header"> 
   <div class="container rst_header_con"> 
    <article class="rst-header-main rst-header-toggle rst_info_header" itemscope="" itemtype="http://schema.org/Restaurant"> 
     <header class="rst-header-info group"> 
      <a class="rst-logo" href="/kxljmlt-pt" itemprop="url"> <img class="rst-logo-img" srcset="http://fuss10.elemecdn.com/e/61/4b14dc708583d288b62c73491e12cjpeg.jpeg?w=48&amp;h=48 1x, http://fuss10.elemecdn.com/e/61/4b14dc708583d288b62c73491e12cjpeg.jpeg?w=96&amp;h=96 2x" alt="开心罗记麻辣烫" itemprop="logo" /> <i class="icon-rst-badge v v-person" title="该商家已通过个人身份认证"></i> </a> 
      <div class="rst-basic-info"> 
       <div class="rst-name-wrapper caret"> 
        <a class="rst-name text-overflow" href="/kxljmlt-pt" data-toggle="bs-tooltip" title="{{ $rest->name }}" itemprop="name">{{ $rest->name }}</a> 
       </div> 
       <div class="rst-misc"> 
        <a id="rst_rating" class="rst-rating" href="/kxljmlt-pt/rating"> <span class="rating-stars">
        @for($i = $min;$i > 1;$i-=2)
            <i class="glyph-rating-star">★</i>
        @endfor
        @for($i = $max;$i > 1;$i-=2)
            <i class="glyph-rating-star off">★</i>
        @endfor
        </span> {{ sprintf("%.1f", $min/2) }} </a> 
        <span class="rst-flavor text-overflow" title="中式">中式</span> 
       </div> 
      </div> 
     </header> 
     <div class="rst-header-detail rst-header-dropdown"> 
      <section class="rst-header-rating group"> 
       <div class="rating-point header" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating"> 
        <a class="point"><span itemprop="ratingValue">{{ sprintf("%.1f", $min/2) }}</span></a> 
        <a class="comment" href="/kxljmlt-pt/rating"><span itemprop="reviewCount">{{ $num }}</span>人评价</a> 
       </div> 
       <ul class="rating-diagram header"> 
        <li class="diagram-item"> <span class="rating-stars"> <i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i></span> <span class="bar" style="width:{{ (($val['10']/$num)*100)/2  }}px;"></span> {{ round((($val['10']/$num)*100)/2) }}% </li> 
        <li class="diagram-item"> <span class="rating-stars"> <i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star off">★</i></span> <span class="bar" style="width:{{ (($val['8']/$num)*100)/2  }}px;"></span> {{ round((($val['8']/$num)*100)/2) }}% </li> 
        <li class="diagram-item"> <span class="rating-stars"> <i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star off">★</i><i class="glyph-rating-star off">★</i></span> <span class="bar" style="width:{{ (($val['6']/$num)*100)/2  }}px;"></span> {{ round((($val['6']/$num)*100)/2) }}% </li> 
        <li class="diagram-item"> <span class="rating-stars"> <i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star off">★</i><i class="glyph-rating-star off">★</i><i class="glyph-rating-star off">★</i></span> <span class="bar" style="width: {{ (($val['4']/$num)*100)/2  }}px;"></span> {{ round((($val['4']/$num)*100)/2) }}% </li> 
        <li class="diagram-item"> <span class="rating-stars"> <i class="glyph-rating-star">★</i><i class="glyph-rating-star off">★</i><i class="glyph-rating-star off">★</i><i class="glyph-rating-star off">★</i><i class="glyph-rating-star off">★</i></span> <span class="bar" style="width:{{ (($val['2']/$num)*100)/2  }}px;"></span> {{ round((($val['2']/$num)*100)/2) }}% </li> 
       </ul> 
      </section> 
      <section class="rst-header-intro">
       {{ $rest->introduce }}
      </section> 
     </div> 
    </article> 
@stop

@section('liebiao')
    <nav class="rst-header-nav"> 
     <a class="rst-header-nav-item" href="/kxljmlt-pt">菜单</a> 
     <div class="inline-block relative"> 
      <span class="rst-header-nav-tip">看图点菜</span> 
      <a class="rst-header-nav-item" href="/kxljmlt-pt/photowall">美食墙</a> 
     </div> 
     <a class="rst-header-nav-item ui_active" href="{{ url('home/shop/comment/'.$id) }}">评价</a> 
     <a class="rst-header-nav-item" href="/kxljmlt-pt/comment">留言</a> 
    </nav>
    <div class="rst-fav-wrapper"> 
     <div id="rst_fav" class="rst-block rst-fav"> 
      <i class="glyph">♥</i> 
      <span class="status" data-unfaved="收藏 餐厅" data-faved="已收藏">收藏 餐厅</span> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div class="container"> 
   <div class="restaurant-main"> 
    <div id="fixed_placeholder" class="rst-subnav-placeholder"> 
    
     <div id="sub_nav" class="rst-block rst-subnav-wrapper group"> 
      <a id="qbpj" class="rst-subnav ui_active">全部评价</a> 
      <a id="mypj" class="rst-subnav ui_active">我要评价</a>
     </div>
    </div> 

    <div id="fom" class="rst-rating-wrapper" style="display:none;">
    <b style="font-size:15px">满意度：</b>
        <ul id="ul">
          <li class="light cli"><a href="javascript:;">2</a></li>
          <li class="cli"><a href="javascript:;">4</a></li>
          <li class="cli"><a href="javascript:;">6</a></li>
          <li class="cli"><a href="javascript:;">8</a></li>
          <li class="cli"><a href="javascript:;">10</a></li>
        </ul>
     <form>
      <input type="hidden" id="rid" name="rest_id" value={{ $rest->user_id }}>
      <textarea style="resize:none;" id="txar" class="form-control" rows="3"></textarea><br>
      <button style="float:right;" id="btn" type="button">提交评价</button><br>
      </form>
    </div>

    <div id="rating_wrap" class="rst-rating-wrapper"> 
     
  <br>
  <div id="80s">
    
  </div>

     <p id="rst_pager" class="rst-pager"> <span class="pager_item rst-pager-item current">1</span> <a class="pager_item rst-pager-item" data-page="2">2</a> <a class="pager_item rst-pager-item" data-page="3">3</a> <a class="pager_item rst-pager-item" data-page="4">4</a> <a class="pager_item rst-pager-item" data-page="5">5</a> <a class="pager_item rst-pager-item flip glyph-caret-right" data-page="2"></a> </p> 
    </div> 
   </div> 
   <aside class="restaurant-aside"> 
    <aside class="rst-aside"> 
     <div class="rst-block rst-rating-aside group"> 
      <div class="rating-point aside" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating"> 
       <strong class="point float-l" itemprop="ratingValue">{{ sprintf("%.1f", $min/2) }}</strong> 
       <div class="detail"> 
        <span class="rating-stars">
        @for($i = $min;$i > 1;$i-=2)
            <i class="glyph-rating-star">★</i>
        @endfor
        @for($i = $max;$i > 1;$i-=2)
            <i class="glyph-rating-star off">★</i>
        @endfor
        </span> 
        <span class="comment" href="/kxljmlt-pt/rating"><span itemprop="reviewCount">{{ $num }}</span>人评价</span> 
       </div> 
      </div> 
      <ul class="rating-diagram aside"> 
       <li class="diagram-item"> <span class="rating-stars"> <i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i></span> <span class="bar" style="width: {{ (($val['10']/$num)*100)/2  }}px;"></span>{{ round((($val['10']/$num)*100)/2) }}%</li> 
       <li class="diagram-item"> <span class="rating-stars"> <i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star off">★</i></span> <span class="bar" style="width: {{ (($val['8']/$num)*100)/2  }}px;"></span> {{ round((($val['8']/$num)*100)/2) }}% </li> 
       <li class="diagram-item"> <span class="rating-stars"> <i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star off">★</i><i class="glyph-rating-star off">★</i></span> <span class="bar" style="width: {{ (($val['6']/$num)*100)/2  }}px;"></span> {{ round((($val['6']/$num)*100)/2) }}% </li> 
       <li class="diagram-item"> <span class="rating-stars"> <i class="glyph-rating-star">★</i><i class="glyph-rating-star">★</i><i class="glyph-rating-star off">★</i><i class="glyph-rating-star off">★</i><i class="glyph-rating-star off">★</i></span> <span class="bar" style="width: {{ (($val['4']/$num)*100)/2  }}px;"></span> {{ round((($val['4']/$num)*100)/2) }}% </li> 
       <li class="diagram-item"> <span class="rating-stars"> <i class="glyph-rating-star">★</i><i class="glyph-rating-star off">★</i><i class="glyph-rating-star off">★</i><i class="glyph-rating-star off">★</i><i class="glyph-rating-star off">★</i></span> <span class="bar" style="width: {{ (($val['2']/$num)*100)/2  }}px;"></span> {{ round((($val['2']/$num)*100)/2) }}% </li> 
      </ul> 
     </div> 
    </aside> 
   </aside> 
  </div> 
  <div id="modal_iLogin" class="bs-modal fade ilogin-modal" tabindex="-1" role="dialog" aria-hidden="true"> 
   <div class="bs-modal-dialog"> 
    <div class="bs-modal-content"> 
     <div class="bs-modal-body"> 
      <a class="bs-close" data-dismiss="bs-modal" aria-hidden="true">&times;</a> 
      <iframe class="ilogin-iframe login_frame" src="" frameborder="0" scrolling="no"></iframe> 
     </div> 
    </div> 
   </div> 
  </div> 

@stop

@section('js')
  <script type="text/javascript" src="{{ asset('bs/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('layer/layer.js') }}"></script>
  
  <script type="text/javascript">
  @if($users)
    @foreach($users as $v)
      $('#80s').prepend('<section class="rst_rating_wrap"><div class="rst-block rst-rating-block"><p class="rst-rating-dish"><img style="width:30px;border-radius:50%;" src="/uploads/{{ $v->avatar }}"><i class="icon-d-star s{{ $v->status }}"></i> <span style="font-size:20px;color:blue;">{{ $v->name }}</span></p><p class="rst-rating-text">{{ $v->content }}</p><p class="rst-rating-info">{{ date("Y-m-d H:i:s",$v->time) }}</p></div></section>');
    @endforeach
  @endif

  //显示评价提交框
     $('#mypj').on('click',function(){
        $('#fom').show();
     })

    var num= finalnum = tempnum= 0;
    var lis = $('.cli');
    //num:传入点亮星星的个数
    //finalnum:最终点亮星星的个数
    //tempnum:一个中间值
    function fnShow(num) {
     finalnum= num || tempnum;//如果传入的num为0，则finalnum取tempnum的值
     for (var i = 0; i < lis.length; i++) {
      lis[i].className = i < finalnum? "light" : "";//点亮星星就是加class为light的样式
     }
    }
    for (var i = 1; i <= lis.length; i++) {
     lis[i - 1].index = i;
     lis[i - 1].onmouseover = function() { //鼠标经过点亮星星。
      fnShow(this.index);//传入的值为正，就是finalnum
     }
     lis[i - 1].onmouseout = function() { //鼠标离开时星星变暗
      fnShow(0);//传入值为0，finalnum为tempnum,初始为0
     }
     lis[i - 1].onclick = function() { //鼠标点击,同时会调用onmouseout,改变tempnum值点亮星星
      tempnum= this.index;
     }
    }

    var nub = 2;

    $('.cli').on('click',function(){
        nub = $(this).text();
    })


    $('#btn').on('click',function(){

        var rid = $('#rid').val();

        var txar = $('#txar').val();
        if(!txar){
          layer.msg('评价不能为空！');
        }

        $.ajax({
          type:'post',
          url:"{{ url('home/shop/comment/ajax') }}",
          data:{'stf':nub,'txar':txar,'rid':rid},
          success:function(data){
              if(data == 1){
                  layer.msg('评价成功');
                  location.reload();
              }else if(data == 2){
                  layer.msg('评价失败');
                  location.reload();
              }
          },
          dataType:'json',
        })

    })

  </script>

@stop
 