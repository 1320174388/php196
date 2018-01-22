@extends('layout.home.personal.personal')


@section('content')
    @section('name', '个人中心')
       <h2>个人中心</h2>
      </div> 
      <div class="content-inner profile-index"> 
       <div class="account-status clearfix"> 
        <div class="clearfix"> 
         <div class="col-left"> 
          <div class="avatar"> 

          <form id="art_form" action="{{ url('/home/personal/upload') }}" method="post">
              {{ csrf_field() }}
              <input id="himg" name="himg" type="file" style="display:none" multipart="true" >
              <div style="">
                <a id="alj" onclick="alj()">上传<br />头像</a>
              </div>
              <button style="display:none" id="btn1"></button>

          </form>
            
          </div> 
          <div class="safety-level-wrapper"> 
           <h5>{{ session('home_user')->name }}</h5> 
           <p> <span class="text-gray">安全等级：</span> <a class="user-safety-level full" href="member_safe_set.html" title="太棒了，您已达到最高安全等级"> 高 </a> </p> 
          </div> 
         </div> 
         <div class="col-right"> 
          <p class="text-gray">账户余额：</p> 
          <div class="account-balance clearfix"> 
           <div class="balance">
            <strong class="">0</strong> 元
           </div> 
           <div class="relative"> 
            <div style="display:none" id="tool-kit-step1" class="toolkit-charge hide">
             <span id="step1_cancel" class="toolkit-close">&times;</span>
            </div>
            <a class="btn btn-yellow" href="member_charge.html">立刻充值</a>
           </div> 
          </div> 
         </div> 
        </div> 

        <ul class="related-info clearfix"> 
         <li> <i class="icon-point"></i>积分： 2800点 <a href="gift.html">兑换礼品</a> </li> 
         <li> <i class="icon-order"></i>完成订单： <a href="member_order.html">0</a>张（一个月内完成） </li> 
         <li> <i class="icon-star"></i>收藏： <a href="member_collect_shop.html">25</a>家餐厅 <a href="member_collect_food.html">7</a>份美食 </li> 
        </ul> 
       </div> 
       <div class="latest-orders tab_wrapper"> 
        <ul class="tab_header"> 
         <li class="active">最近饿单</li> 
         <li>最近在线交易<span class="tip">1</span> </li> 
        </ul> 
        <div class="tab_body"> 
         <div class="food-orders"> 
          <a class="more" href="member_order.html">更多饿单&gt;&gt;</a> 
          <table> 
           <thead> 
            <tr> 
             <th>饿单号</th> 
             <th>下单时间</th> 
             <th>餐厅</th> 
             <th>饿单详情</th> 
             <th>饿单状态</th> 
            </tr> 
           </thead> 
           <tbody> 
            <tr> 
             <td class="sn"><a href="/profile/order/filter/single/id/12266119358749105" target="_blank">12266119358749105</a></td> 
             <td class="time">3-9 23:03</td> 
             <td class="restaurant">臻好时酸奶…</td> 
             <td>原味炒酸奶1份/抹茶炒酸奶1份/巧克力…</td> 
             <td class="status"><span class="
                  gray"> 无效订单 </span> </td> 
            </tr> 
           </tbody> 
          </table> 
         </div> 
         <div class="deal-orders hide"> 
          <a class="more" href="member_schedule.html">更多在线交易&gt;&gt;</a> 
          <table> 
           <thead> 
            <tr> 
             <th>创建时间</th> 
             <th>交易类型</th> 
             <th>交易详情</th> 
             <th>金额</th> 
             <th>交易状态</th> 
            </tr> 
           </thead> 
           <tbody> 
            <tr> 
             <td class="time">3-9 23:08</td> 
             <td class="type">充值</td> 
             <td>网上充值 - 订单号：97835242</td> 
             <td class="price amount"><span class="green">+300.00</span></td> 
             <td class="status readable-status"> <span>进行中</span> <br /><a href="http://p.ele.me/pay/97835242" target="_blank">完成充值</a> </td> 
            </tr> 
            <tr> 
             <td class="time">9-24 13:25</td> 
             <td class="type">充值</td> 
             <td>175519 - 订单号：17472475</td> 
             <td class="price amount"><span class="green">+58.00</span></td> 
             <td class="status readable-status"> <span>失败</span> </td> 
            </tr> 
            <tr> 
             <td class="time">9-24 13:25</td> 
             <td class="type">饿了么外卖</td> 
             <td>【半价+赠饮】功夫手擀面（原胡一刀） - 订单号：12757021601751831</td> 
             <td class="price amount"><span class="green">-58.00</span></td> 
             <td class="status readable-status"> <span>失败</span> </td> 
            </tr> 
            <tr> 
             <td class="time">3-11 11:36</td> 
             <td class="type">充值</td> 
             <td>hjl416148489 - 订单号：10643890</td> 
             <td class="price amount"><span class="green">+28.00</span></td> 
             <td class="status readable-status"> <span>失败</span> </td> 
            </tr> 
            <tr> 
             <td class="time">3-11 11:36</td> 
             <td class="type">饿了么外卖</td> 
             <td>康博煲仔饭 - 订单号：12446256481122141</td> 
             <td class="price amount"><span class="green">-28.00</span></td> 
             <td class="status readable-status"> <span>失败</span> </td> 
            </tr> 
           </tbody> 
          </table> 
         </div> 
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 

@stop

@section('js')
    
    <script type="text/javascript">
     function alj() 
     {
          document.getElementById("himg").click();
     }

     $(function(){
        $("#himg").change(function(){
          // alert('123');
           upload();
        });
     });

     function upload()
     {
          //判断是否有选择上传文件
          var imgPath = $("#himg").val();
          if (imgPath == "") {
              alert("请选择上传图片！");
              return;
          }
          //判断上传文件的后缀名
          var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
          if (strExtension != 'jpg' && strExtension != 'gif'
              && strExtension != 'png' && strExtension != 'bmp') {
              alert("请选择图片文件");
              return;
          }
          var myform = document.getElementById('art_from');


          //将整个form打包进formData对象中传到服务器。
          var formData = new FormData($('#art_form')[0]);

          //只将文件上传表单项的内容放入formData对象
          var formData = new FormData();
          formData.append('file_upload', $('#himg')[0].files[0]);
          // formData.append('_token', '{{csrf_token()}}');
          //                             {{--console.log(formData);--}}
           $.ajax({
              type: "POST",
              url: "/home/personal/upload",
              data: formData,
              async: true,
              cache: false,
              contentType: false,
              processData: false,
              success: function(data) {

                  // 添加到数据库， 七牛云

                  alert('上传成功 ！');




              },
              error: function(XMLHttpRequest, textStatus, errorThrown) {
                  alert("上传失败，请检查网络后重试");
              }
          });
     }




   // $('#himg').on('change',function(){

   //      var himg = $('#himg').val();

   //     $.ajax({
   //        url:"{{ url('/home/txajax') }}",
   //        type:'post',
   //        data:{'file': himg},
   //        success:function(data){
   //            if(data == 1){
   //              console.log('添加成功');
   //            }else{
   //              console.log('添加失败');
   //            }
   //        },
   //        dataType:'json',

   //     });
    
   //  });

  </script>
 
@stop
  
 </body>
</html>