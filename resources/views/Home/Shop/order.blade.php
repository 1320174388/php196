<!DOCTYPE html>
<html>
<head>
 <title>订单生成</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <meta name="description" content=""/>
 <meta name="format-detection" content="telephone=no" />
 <meta name=""/>
 
<link rel="stylesheet" href="{{ url('/home/shop/order/tasp.css') }}" />
<link href="{{ url('/home/shop/order/orderconfirm.css') }}" rel="stylesheet" />

<style>
#page{width:auto;}
#comm-header-inner,#content{width:950px;margin:auto;}
#logo{padding-top:26px;padding-bottom:12px;}
#header .wrap-box{margin-top:-67px;}
#logo .logo{position:relative;overflow:hidden;display:inline-block;width:140px;height:35px;font-size:35px;line-height:35px;color:#f40;}
#logo .logo .i{position:absolute;width:140px;height:35px;top:0;left:0;background:url(http://a.tbcdn.cn/tbsp/img/header/logo.png);}
</style>

</head>
<body data-spm="1">
<div id="page">

 <div id="content" class="grid-c">
  <div>
 <h3 class="dib">确认订单信息</h3>
 <table cellspacing="0" cellpadding="0" class="order-table" id="J_OrderTable" summary="统一下单订单信息区域">
     <caption style="display: none">统一下单订单信息区域</caption>
     <thead>
     <tr>
     <th class="s-title">购买食品<hr/></th>
     <th class="s-amount">数量<hr/></th>
     <th class="s-agio">优惠方式(元)<hr/></th>
      <th class="s-price">食品价格(元)<hr/></th>
     </tr>
     </thead>
     

<tbody data-spm="3" class="J_Shop" data-tbcbid="0" data-outorderid="47285539868"  data-isb2c="false" data-postMode="2" data-sellerid="1704508670">


<form name="addrForm" id="addrForm" action="{{ url('/home/shop/orderss') }}" method="post">

  {{ csrf_field() }}
  <input type="hidden" name="user_id" value="{{ session('home_user')->id }}">
  <input type="hidden" name="rest_id" value="{{ $arrdp->user_id }}">

  <input type="hidden" name="price" value="{{ $pricez }}" >
  <input type="hidden" name="arrdp" value="{{ $arrdp->name }}" >
  <input type="hidden" name="number" value="{{ $arruser->name }}">
<tr class="first"><td colspan="5"></td></tr>
<tr class="shop blue-line">
 <td colspan="3">
   店铺：<a class="J_ShopName J_MakePoint" data-point-url="" target="_blank" title="{{ $arrdp->name }}">{{ $arrdp->name }}</a>
     <span class="seller">卖家：<a href="" target="_blank" class="J_MakePoint" data-point-url="http://log.mmstat.com/buy.1.15">{{ $arruser->name }}</a></span>
     <span class="J_WangWang"  data-nick="{{ $arruser->name }}"   data-display="inline" ></span>
    @if (count($errors) > 0)
        @if(is_object($errors))
          @foreach ($errors->all() as $error)
            <span class="seller" style="color:red;">{{ $error }}</span>
          @endforeach
        @else
            <span class="seller" style="color:red;">{{ $errors }}</span>
        @endif
    @endif
    </td>
 <td colspan="2" class="promo">
 <div>
   <ul class="scrolling-promo-hint J_ScrollingPromoHint">
       </ul>
   </div>
 </td>
</tr>
@foreach($arr as $k=>$v)
 <tr class="item" data-lineid="19614514619:31175333266:35612993875" data-pointRate="0">
 <td class="s-title">
     <img src="{{ url('/shopUploads/'.$v->img) }}" class="itempic"><span class="title J_MakePoint" data-point-url="">{{ $v->name }}</span>
 <a title="店家承诺30分钟内送到您的手中" href="#" target="_blank">
</a>
    <div>
 <span style="color:gray;">店家承诺30分钟内送到您的手中</span>
 </div>
     </td>

 <td class="s-amount" data-point-url="">
         <input type="hidden" class="J_Quantity" />{{ $v->number }}
 </td>
 <td class="s-agio">
       <div class="J_Promotion promotion" data-point-url="">无优惠</div>
   </td>
 <td class="s-total">
   
   <span class='price '>
 <em class="style-normal-bold-red J_ItemTotal "  >{{ $v->price }}</em>

      <input type="hidden" name="food_id[]" value="{{ $v->food_id }}">
      <input type="hidden" name="food_number[]" value="{{ $v->number }}">
      <input type="hidden" name="food_price[]" value="{{ $v->price }}">
  </span>
    
 </td>
</tr>

@endforeach

<tr class="blue-line" style="height: 2px;"><td colspan="5"></td></tr>
<tr class="other other-line">
 <td colspan="5">
 <ul class="dib-wrap">
 <li class="dib user-info">
 <ul class="wrap">
 <li>
  <div class="field gbook">
   <label class="label">给卖家留言：</label>
   <textarea name="text" style="width:350px;height:80px;" title="选填：对本次交易的补充说明（建议填写已经和卖家达成一致的说明）"></textarea>
 </div>
</li>
   </ul>
 </li>
 <li class="dib extra-info">

 <div class="shoparea">
 <ul class="dib-wrap">
 <li class="dib title">店铺优惠：</li>
 <li class="dib sel"><div class="J_ShopPromo J_Promotion promotion clearfix" data-point-url="http://log.mmstat.com/buy.1.16"></div></li>
 <li class="dib fee">  <span class='price '>
 -<em class="style-normal-bold-black J_ShopPromo_Result"  >0.00</em>
  </span>
</li>
 </ul>
 </div>

 <div class="shoppointarea"></div>
   <div class="extra-area">
 <ul class="dib-wrap">
 <li class="dib title">配送时间：</li>
 <li class="dib content">店家承诺30分钟内送到您的手中</li>
 </ul>
 </div>
   
 <div class="servicearea" style="display: none"></div>
 </li>
 </ul>
 </td>
</tr>

<tr class="shop-total blue-line">
 <td colspan="5">店铺合计<span class="J_Exclude" style="display: none"></span><span class="J_ServiceText" style="display: none">，服务费</span>：
   <span class='price g_price '>
 <span>&yen;</span><em class="style-middle-bold-red J_ShopTotal" >{{ $pricez }}.00</em>
  </span>

</tr>
</tbody>
  <tfoot>
 <tr>

 <td colspan="5">
 <div class="order-go" data-spm="4">
 <div class="J_AddressConfirm address-confirm" style="width:100%">
 <div class="pop-back" style="margin-bottom: 40px;">
 <div class="box" style="">
 <div class="bd">
 <div class="point-in">
   <em class="t">实付款：</em>  <span class='price g_price '>
 <span>&yen;</span><em class="style-large-bold-red"  id="J_ActualFee"  >{{ $pricez }}.00</em>
  </span>
</div>

  <ul >
 <div id="address" class="address" style="margin-top: 20px; width:100%;float:left;" data-spm="2" >

<h3>确认收货地址
 <span class="manage-address">
 </span>
</h3>
<ul id="address-list" class="address-list">
     <li class="J_Addr J_MakePoint clearfix  J_DefaultAddr "  data-point-url="http://log.mmstat.com/buy.1.20">
 <s class="J_Marker marker"></s>
 <span class="marker-tip">寄送至</span>
   <div class="address-info">
@if($arrdz)
  @foreach($arrdz as $k=>$v)
   <label name="address" for="" class="user-address">
        <input type="radio" value="{{ $v->address }}" name="address"> 地址： {{ $v->address }} <br />
   </label>
  @endforeach
  <h4><a href="{{ url('/home/personal/addrindex') }}" target="_blank">填写新地址</a></h4>
@else
 <h4>您还没有填写地址--><a href="{{ url('/home/personal/addrindex') }}" target="_blank">填写地址</a></h4>
@endif

 </div>
     </li>
     <li class="J_Addr J_MakePoint clearfix"
 data-point-url="http://log.mmstat.com/buy.1.20" >
 <s class="J_Marker marker"></s>
   <div class="address-info">
 <a href="#" class="J_Modify modify J_MakePoint" data-point-url="#">修改本地址</a>
 </div>
   </li>
     </ul>


</div>
 <li><em>收货人:</em><span name="user_name" value="{{ session('home_user')->name }}" id="J_AddrNameConfirm">{{ session('home_user')->name }}  </span></li>
 
@if($arrdz)
    <li><em>电话:</em><span name="addr_phone" value="{{ $v->addr_phone }}" id="J_AddrNameConfirm">{{ $arrdz[0]->addr_phone }} </span></li>
@endif
 </ul>
     </div>
 </div>
         <a href="{{ url('home/shop/buy/') }}/{{ $arrdp->user_id }}"
 class="back J_MakePoint" target="_top"
 data-point-url="">返回餐店</a>
       <input id="J_Go" class=" btn-go" type="submit" data-point-url=""  tabindex="0" title="点击此按钮，提交订单。"><b class="dpl-button"></b>
  </div>
 </div>

 </div>
 </td>
 </tr>
 </tfoot>
 </table>
</div>
</div>
</form>
</body>
</html>
