
<!DOCTYPE html>
<html class="no-js" lang="zh">
 <head> 
  <meta charset="utf-8" /> 
  <title> {{ $title }}- 页面</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @section('css')

  @show

 </head> 
 <body class="page-account"> 
  <header class="header"> 
  <img class="logo-img" src="home/images/logo.b38593f4.png" alt="ele.me| 叫外卖？上饿了么！" /> </a> </h1> 
  </header> 

  <div class="container clrfix"> 
   <aside class="banner"> 
    <img class="img" src="home/images/banner-app.75596728.png" alt="随时随地轻松订餐" /> 
   </aside> 
   <div class="panel"> 
    <div class="panel-hd clrfix"> 
     <h2 class="title">{{ $title }}</h2> 
    </div> 
    
    @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @if(is_object($errors))
              @foreach ($errors->all() as $error)
                <li style="color:red">{{ $error }}</li>
              @endforeach
            @else
                <li style="color:red">{{ $errors }}</li>
            @endif
          </ul>
        </div>
    @endif


    @section('content')

    @show


  <footer class="site-footer group" role="contentinfo"> 
   <div class="container"> 
    <p class="sfooter-line"> <a class="sfooter-link" href="http://kaidian.ele.me">我要开店</a> | <a class="sfooter-link" href="contact.html">联系我们</a> | <a class="sfooter-link" href="http://ele.me/about/agreement">服务条款和协议</a> | <a class="sfooter-link" href="sitemaps.html">站点地图</a> | <a class="sfooter-link" href="http://ele.me/jobs">加入我们</a> </p> 
   </div> 
  </footer>


<script type="text/javascript" src="/home/js/jquery-1.8.3.min.js"></script>
<script>
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