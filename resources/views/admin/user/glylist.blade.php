@extends('layouts.admin')
@section('title','后台首页')
@section('content')


<section id="finance-content">
	<div class="finance-content clearfix">

		<div class="finance-content-middle">
			<div class="finance-content-middle-form">
				<div class="finance-add-agent finance-add-agent-color">
					<table>
						<tbody>
							<tr>
								<th>账户</th>
								<th>客户姓名</th>
								<th>注册时间</th>
								<th>操作</th>
							</tr>
							<tr>
								<td>18301226993</td>
								<td>郑爽</td>
								<td>2017-11-11 12:00</td>
								<td>分配</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="finance-page clearfix">
					<span>共200条</span>
					<select>
						<option>50条/页</option>
						<option>50条/页</option>
						<option>50条/页</option>
						<option>50条/页</option>
						<option>50条/页</option>
					</select>
					<a href="#">上一页</a>
					<a href="#">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
					<a href="#">4</a>
					<a href="#">5</a>
					<a href="#">...</a>
					<a href="#">20</a>
					<a href="#">下一页</a>
					<span>跳转至第</span>
					<input type="text" name="" value="8" placeholder="">
					<span>页</span>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="themes/js/jquery-3.2.1.min.js"></script>
<script src="themes/js/address.js"></script>
@endsection