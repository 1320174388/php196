@extends('layout.home.personal.personal')
@section('name', '111')
@section('content')
    
  <h2>我收藏的餐厅</h2>
</div>

<div class="content-inner">
      <div id="" class="favor-restaurants">
    <h3>当前区域餐厅 - 共1个</h3>
      <table class="favor_table table">
      <tbody>
@foreach($rests as $k=>$v)

        <tr class="my_favored_restaurant">
          <td class="restaurant-column">
            <div class="restaurant-block lite">
              <div class="line-one">
                <div class="logo-wrapper">
                    <div class="logo">
                              <a href="" target="_blank"><img class="restaurant-logo" alt="老桂林风味馆  (正宗桂林米粉）" title="老桂林风味馆  (正宗桂林米粉）" srcset="http://fuss10.elemecdn.com/e/61/4b14dc708583d288b62c73491e12cjpeg.jpeg?w=48&h=48 1x, http://fuss10.elemecdn.com/e/61/4b14dc708583d288b62c73491e12cjpeg.jpeg?w=96&h=96 2x"></a>
                    </div>
                        <div class="deliver-time-wrapper busy tooltip_on" data-toggle="tooltip" title="餐厅当前送餐较块哦">
                          45+分钟
                        </div>
                </div>
                <div class="info">
                  <div class="name">
                    <a class="restaurant-link" href="#" target="_blank">{{ $v->name }}</a>
                  </div>
                          <div class="flavors three-line">
                              中式
                          </div>

                    <div class="ratings three-line">
                                <div class="r10 rating-star" title="餐s厅评价：4.6星"></div>
                                  <span class="rating-number"></span>
                    </div>

                </div>

              </div>
            </div>
            </td>
          <td valign="top">
            <div class="action">
              <span class="admin_del delete" rest="{{ $v->rest_id }}">
                  <a href="javascript:;">
                    <i  class="icon-remove "></i>
                  </a>
              </span>
            </div>
          </td>
        </tr>
@endforeach
            </tbody>
      </table>
    </div>
  </div>
  </div>
</div>
</div>
<script type="text/javascript">

  $(function(){
    $(".delete").on('click', function(){
        var rest = $(this).attr('rest');
        console.log(rest);
        $.ajax({
          url:"{{ url('/home/removesc') }}",
          type:'post',
          data:{'rest_id':rest, 'user_id':{{ session('home_user')->id }}, '_token':"{{ csrf_token() }}" },
          success:function(data){
              console.log(data);
              if(data == 1)
              {
                layer.msg('删除成功');
                location.reload();
              }else
              {
                layer.msg('删除失败');
                location.reload();
              }
          },
          dateType:'json'
        });
    });
  })



</script>

@stop
