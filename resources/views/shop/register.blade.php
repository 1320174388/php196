<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>input</title>
    <link type="text/css" href="/shop/css/input.css" rel="stylesheet">
    <style type="text/css">
        select{
            border-radius:3px;
            width:150px;
            margin-bottom:12px;
            margin-left:10px;
        }
    </style>
</head>

<body>
    <div class="title">
        <span class="title_name">开店申请</span>
    </div>
    <div class="center_container"></div>
    <form id="form" action="{{ url('/shop/doreg') }}" method="post" class="center">
        {{ csrf_field() }}
        <div id="centerBody" class="center_body">
            <p>
                <span class="sign"></span>
                <span class="font">请填写店铺名称</span>
            </p>
            <span class="line"></span>
            <input name="name" placeholder="请输入您的餐店名称" data-sign="shopname" maxlength="20" />
            <p>
                <span class="sign"></span>
                <span class="font">请选择店铺地址</span>
            </p>
            <span class="line"></span>
            <select id="selecte_1" ></select>
            <select id="selecte_2" ></select>
            <select id="selecte_3" name="cityCode"></select>
            <p>
                <span class="sign"></span>
                <span class="font">请填写身份信息</span>
            </p>
            <span class="line"></span>
            <input name="nameid" placeholder="请输入真实姓名" data-sign="phone" maxlength="20" />
            <input name="numberid" placeholder="请输入身份证号" data-sign="phone" maxlength="20" />
            <p>
                <span class="sign"></span>
                <span class="font">请填写餐厅电话</span>
            </p>
            <span class="line"></span>
            <input name="phone" placeholder="请输入餐店电话" data-sign="phone" maxlength="20" />
            <p>
                <span class="sign"></span>
                <span class="font">请填写餐店介绍</span>
            </p>
            <span class="line"></span>
            <textarea name="introduce" placeholder="请输入店铺的信息" data-null="true" data-sign="detailed" maxlength="100" ></textarea>
        </div>
        <div class="title">
            <span id="submit" class="btn btn_enable">提 交</span>
        </div>

        <input name="user_id" type="hidden" value="{{ session('user')->id }}">
    </form>
    <div class="author">
    </div>
</body>
<script type="text/javascript" src="/shop/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/shop/js/input.js"></script>
<script type="text/javascript">
    @foreach($province as $p)
        $('#selecte_1').append('<option value="{{ $p->id }}">{{ $p->name }}</option>');
    @endforeach
    @foreach($city as $c)
        $('#selecte_2').append('<option value="{{ $c->id }}">{{ $c->name }}</option>');
    @endforeach
    @foreach($town as $t)
        $('#selecte_3').append('<option value="{{ $t->id }}">{{ $t->name }}</option>');
    @endforeach
    var val1 = null;
    var val2 = null;
    var val3 = null;

    $('#selecte_1').on('change',function(){
      val1 = $('#selecte_1').val();
      $.ajax({
        url:"/home/address",
        type:'post',
        async:true,
        data:{pr:val1,'_token':'{{ csrf_token() }}' },
        success:function(data){
            $('#selecte_2').empty();
            $.each(data['city'],function(i,n){
              $('#selecte_2').append("<option value='"+n.id+"'>"+n.name+"</option>");
            });
            $('#selecte_3').empty();
            $.each(data['town'],function(i,n){
              $('#selecte_3').append("<option value='"+n.id+"'>"+n.name+"</option>");
            });
        },
        dataType:'json'
      });
    });

    $('#selecte_2').on('change',function(){
      val1 = $('#selecte_1').val();
      val2 = $('#selecte_2').val();
      $.ajax({
        url:"/home/address",
        type:'post',
        async:true,
        data:{pr:val1,ci:val2,'_token':'{{ csrf_token() }}' },
        success:function(data){
            $('#selecte_3').empty();
            $.each(data['town'],function(i,n){
              $('#selecte_3').append("<option value='"+n.id+"'>"+n.name+"</option>");
            });
        },
        dataType:'json'
      });
    });
</script>
</html>
