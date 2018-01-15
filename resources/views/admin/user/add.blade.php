@extends('layouts.admin')
@section('title','添加管理员首页')
@section('content')

<section id="finance-content">
	<div class="finance-content clearfix">
		<div class="finance-content-middle">
			<div class="finance-content-middle-form finance-add-agent-ad">
				<h3>普通管理员</h3>
				<div class="finance-add-agent">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" >
                            <ul style="margin-left: 1s85px ">
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
					<form action="{{ url('admin/user') }}" method="post">
						{{csrf_field()}}
						<p>
							<label>账号：</label>
							<input type="text" name="name" value="" placeholder="请输入你的账号">
							<em>*(必填)</em>
						</p>
						<p>
							<label>密码：</label>
							<input type="password" name="password" value="" placeholder="请输入你的密码">
							<em>*(必填)</em>
						</p>
						<p>
							<input type="submit" value="添加">
	                        <input type="button" class="back" onclick="history.go(-1)" value="返回">
	                    </p>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="themes/js/jquery.min.js"></script>
<script src="themes/js/date.js"></script>
<script type="text/javascript">
    $(function(){

        $('.date_picker').date_input();

    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var menuParent = $('.menu > .ListTitlePanel > div');//menu div
        var menuList = $('.menuList');
        $('.menu > .menuParent > .ListTitlePanel > .ListTitle').each(function(i) { //list
            $(this).click(function(){
                if($(menuList[i]).css('display') == 'none'){
                    $(menuList[i]).slideDown(300);
                }
                else{
                    $(menuList[i]).slideUp(300);
                }
            });
        });
    });
</script>
@endsection