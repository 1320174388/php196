@extends('layout.home.personal.personal')
@section('content')


       <h2>管理我的地址</h2> 
      </div> 
      <div class="content-inner profile-address"> 
      @section('name', '我的地址')
         @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @if(is_object($errors))
              @foreach ($errors->all() as $error)
              <li class="aaaa" style="color:red">{{ $error }}</li>
              @endforeach
            @else
                <li class="aaaa" style="color:green">{{ $errors }}</li>
            @endif
          </ul>
        </div>
      @endif
       <h3>已经保存的送餐地址</h3> 
       <table class="address-table table table-bordered"> 
        <thead> 
         <tr> 
          <th class="col-address">地址</th> 
          <th class="col-phone">手机号码</th> 
          <th class="col-action">操作</th> 
         </tr> 
        </thead> 
        <tbody>

          @foreach($user_addr as $k=>$v)
         <tr class="stable_address">
          <td class="col-address">{{ $v->address }}</td>
          <td class="col-phone">{{ $v->addr_phone }}</td>
          <td class="col-action"> <span>默认地址</span> | <a class="gray_link" href="javascript:;" onclick="del({{ $v->id }})">删除</a> </td>
         </tr> 
          @endforeach

        </tbody> 
       </table> 
       <h3>新增/编辑送餐地址</h3> 
       <form id="add_address_form" class="ui-form-horizontal" name="" method="post" action="{{ url('/home/personal/addradd') }}">
        {{ csrf_field() }} 
        <input type="hidden" type="text" name="user_id" value="{{ session('home_user')->id }}">

        <label for="address_address"><span class="required-mark">*</span>详细地址</label> 
        <input type="text" name="address" id="address_address" /> 
        <p>（请填写真实详细的送餐地址）</p> 
        <label for="address_phone"><span class="required-mark">*</span>手机号码</label> 
        <input type="text" name="addr_phone" id="address_phone" /> 
        <p>（请保证外卖员能打通该号码）</p> 
        <div class="ui-form-footer">
         <button id="add_address_submit" class="btn btn-yellow">保存</button> 
        </div> 
       </form> 
      </div> 
     </div> 
    </div> 
   </div> 
   <script>
        public function del(id){

          layer.confirm('您确定要删除吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
  
                //向服务器发送ajax请求，删除当前id对应的用户数据
//                $.post('请求的路由','携带的参数','处理成功后的返回结果')
                $.post("{{ url('/home/personal/delete') }}/"+ id, {'_token':"{{csrf_token()}}"}, 
                  function (data) {
//                    data就是服务器返回的json数据
//                    console.log(data);
//                    JSON.parse()
//                    JSON.stringify()
                    if(data.status == 0){
                            location.reload();
                    }else{

                          location.reload();
                    }

                })
          }
        }
    </script>
@stop