@extends('layout.home.personal.personal')
@section('title', '已完成订单')

@section('css')
  <style>
    td{
      font-size:10px;
    }
  </style>
@stop

@section('content')
  
        <div class="order-block" data-id="12358330119834450"> 
         <div class="order-table-wrapper"> 
          <table class="order-table table table-striped"> 
           <thead> 
            <tr> 
             <th class="col-sub-total">订单编号</th> 
             <th class="col-sub-total">订单状态</th> 
             <th class="col-sub-total">卖家名称</th> 
             <th class="col-sub-total">订单金额</th> 
             <th class="col-sub-total">地址信息</th> 
             <th class="col-sub-total">提交时间</th> 
             <th class="col-sub-total">操作</th> 
            </tr> 
           </thead> 
           @if(!empty($order[0]))
            @foreach($order as $k=>$v)
             <thead> 
              <tr> 
               <td class="col-sub-total">{{ $v->order_number }}</td> 
               <td class="col-sub-total">
                @if($v->status == 0)
                  <span style="color:green;">新订单</span>
                @endif
              </td> 
               <td class="col-sub-total">{{ $v->name }}</td> 
               <td class="col-sub-total">{{ $v->price }}</td> 
               <td class="col-sub-total">{{ $v->address }}</td> 
               <td class="col-sub-total">{{ $v->order_time }}</td> 
               <td class="col-sub-total">
                 <a href="javascript:;">
                    <button order="{{ $v->order_number }}" class="button order_details" style="width:99%; color:blue;">订单详情</button>
                  </a>
                </td> 
              </tr> 
             </thead>
            @endforeach
          @else
              <thead>
                <tr>
                  <th colspan="7" ><center><h1>没查询到符合条件的记录</h1></center></th>
                </tr>
              </thead>
          @endif
          </table>

         </div> 
        </div> 
       </div> 
       <div> 
        <div class="pagination"> 

        </div> 
       </div> 
      </div> 
      <div id="modal-shuiqunawaimai" class="modal-who-get-dishes modal hide fade" aria-hidden="true" tabindex="-1"> 
       <div class="modal-header"> 
        <a href="#" class="close" aria-hidden="true">&times;</a> 
        <h3>谁去拿外卖</h3> 
       </div> 
       <div class="modal-body"> 
        <div class="who-get-dishes-wrapper"> 
         <h2 class="wgd-badge"></h2> 
         <a id="trigger" class="wgd-btn"></a> 
         <span class="wgd-rules">随机到最小数字的人去拿外卖</span> 
         <span id="lastResult" class="wgd-bg-text">↓ Start</span> 
         <ul id="result" class="wgd-result-list"></ul> 
        </div> 
       </div> 
      </div> 
      <div id="modal-cart-not-the-same-restaurant" class="modal hide fade" aria-hidden="true" tabindex="-1"> 
       <div class="modal-header"> 
        <a href="#" class="close" aria-hidden="true">&times;</a> 
        <h3>请先清空美食篮子</h3> 
       </div> 
       <div class="modal-body"> 
        <p>您需要先清空美食篮子才能挑选其他餐厅的美食哦:)</p> 
       </div> 
       <div class="modal-footer"> 
        <a href="/cart/clearGroup" class="btn  btn-yellow clear-cart">清空美食篮子</a> 
       </div> 
      </div> 
      <div id="modal_cancelOrderByPhone" class="modal-cancel-order-by-phone modal hide fade" aria-hidden="true" tabindex="-1"> 
       <div class="modal-header"> 
        <a href="#" class="close" aria-hidden="true">&times;</a> 
        <h3> <i class="icon-phone"></i>拨打餐厅电话退单： <span id="cancel_rstTel"></span> </h3> 
       </div> 
       <div class="modal-body"> 
        <div class="order-info clearfix"> 
         <img id="cancel_rstLogo" /> 
         <h4 id="cancel_rstName"></h4> 
         <p> 饿单号：<span id="cancel_orderSn"></span>&nbsp; 金额：<span id="cancel_orderTotal"></span>元 </p> 
        </div> 
       </div> 
       <div class="modal-footer"> 
        <a href="#" class="btn  btn-yellow close" aria-hidden="true">返回饿单</a> 
       </div> 
      </div> 
      <div id="modal_tradeReport" class="modal-who-get-dishes modal hide fade" aria-hidden="true" tabindex="-1"> 
       <div class="modal-header"> 
        <a href="#" class="close" aria-hidden="true">&times;</a> 
        <h3>投诉举报</h3> 
       </div> 
       <div class="modal-body"> 
        <div class="alert-error trade-error" id="trade-warning-banner"></div> 
        <form name="trade-form" id="trade-form"> 
         <input type="hidden" name="trade-order-id" id="trade-order-id" /> 
         <input type="hidden" id="exchange_csrf" value="f8fad6e4510afe5fbd48dc5206d213175bf57c1f" /> 
         <label><input type="radio" class="trade-radio" name="trade-item" value="0" />餐厅已确认，但没送外卖</label> 
         <label><input type="radio" class="trade-radio" name="trade-item" value="1" />餐厅参加了活动，但没有优惠</label> 
         <label><input type="radio" class="trade-radio" name="trade-item" value="2" />吐槽其他</label> 
         <div>
          <textarea class="trade-text" id="trade-text" name="trade-text" disabled="disabled" placeholder="输入您想要吐槽的内容"></textarea>
         </div> 
        </form> 
       </div> 
       <div class="modal-footer"> 
        <a id="trade-check-btn" class="btn" aria-hidden="true">确定</a> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
   <div id="site_fixed" class="site-fixed"> 
    <a id="back_top" class="btn-back-top ui_invisible" role="button" title="回顶部"><i class="icon-backtop"></i></a> 
    <div class="btn-app-qrcode"> 
     <i class="icon-qrcode"></i> 
     <img class="img-qrcode" src="{{ asset('/home/images/app-qrcode.png') }}" alt="扫描二维码免费下载手机App" /> 
    </div> 
   </div> 
   <footer class="site-footer"> 
    <p class="sfooter-link-list"> <a class="sfooter-link" href="http://kaidian.ele.me">我要开店</a> <a class="sfooter-link" href="contact.html">联系我们</a> <a class="sfooter-link" href="agreement.html">服务条款和协议</a> <a class="sfooter-link" href="sitemaps.html">站点地图</a> <a class="sfooter-link" href="http://jobs.ele.me">加入我们</a> </p> 
    <p> 增值电信业务许可证：<a class="sfooter-link sfooter-link-zero" target="_blank" rel="nofollow" href="http://www.shca.gov.cn">沪B2-20150033</a> <a class="sfooter-link" target="_blank" rel="nofollow" href="http://www.miibeian.gov.cn">沪ICP备 09007032</a> <a class="sfooter-link" target="_blank" rel="nofollow" href="http://www.sgs.gov.cn/lz/licenseLink.do?method=licenceView&amp;entyId=20120305173227823">上海工商行政管理</a> Copyright &copy;2008-2015 ele.me, All Rights Reserved. </p> 
   </footer> 
  </div>

  <script type="text/javascript">
    var s = 0;
    $('.order_details').on('click',function(){
      if(s == 0){
        s++;
        var order = $(this).attr('order');
        $.ajax({
          url:"{{ url('home/order/detail') }}",
          type:'post',
          data:{'order_number':order,'_token':"{{ csrf_token() }}"},
          success:function(data){
            var str = '<table border="1" style="margin:auto auto" cellpadding="10" cellspacing="0">';
            str += '<tr><th>食品名称</th><th>食品数量</th><th>食品价格</th></tr>';
            $.each(data,function(i,n){
              str += '<tr><td>'+n.name+'</td><td>'+n.food_num+'</td><td>'+n.price+'</td></tr>';
            });
            str += '</table>';
            //页面层
            layer.open({
              type: 1,
              skin: 'layui-layer-rim', //加上边框
              area: ['420px', '240px'], //宽高
              content: str
            });
            s = 0;
          },
          dataType:'json'
        });
      }
    });
  </script>
@stop