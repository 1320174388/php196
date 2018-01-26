<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
		<title>购物车</title>
		<!--css类引用-->
		<link rel="stylesheet" href="{{ url('/home/shop/order/js/layui/css/layui.css') }}" />
		<link rel="stylesheet" href="{{ url('/home/shop/order/js/eleme-ui/index.css') }}" />
		<link rel="stylesheet" href="{{ url('/home/shop/order/css/ShoppingCart.css') }}" />
	</head>
	<body>

		<!--主要内容-->
		<div class="row " id="myVue" v-cloak>
			<div class="col-lg-10 col-lg-offset-1" >
				<div class="layui-form">
					<table class="ShopCartTable layui-table">
						<thead>
							<tr>
								<th class="selectLeft">
									<template>
									    <el-checkbox  @change="checkedAllBtn(checkedAll)" v-model="checkedAll">全选</el-checkbox>
									</template>
									<span class="selectLeftGoods">商品或服务名称</span>
								</th>
								<th>单价</th>
								<th>数量</th>
								<th>小计</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(tabledatas,index) in shopTableDatas">
								<td  class="selectLeft">
									<template>
									    <el-checkbox @change="checkedRadioBtn(tabledatas)" v-model="tabledatas.checked"></el-checkbox>
									</template>
									<span class="goodName">
										<img class="goodImg" :src="tabledatas.src" />
									</span>
									<span class="goodName goodsName">
										<h2 class="goodname" v-text="tabledatas.name"></h2>
										<p class="goodGary">
											<span>供应商：</span>
											<span v-text="tabledatas.supplier"></span>
										</p>
										<p class="goodGary">
											<span>发货地：</span>
											<span v-text="tabledatas.ConPlace"></span>
										</p>
									</span>
								</td>
								<td class="danPrice">{{tabledatas.price | moneyFiler}}</td>
								<td>
									<i @click="goodNum(tabledatas,-1)" class="fa  deleteBtn" aria-hidden="true">-</i>
									<input v-model="tabledatas.num" type="text" class="form-control numInput" aria-label="...">
									<i @click="goodNum(tabledatas,1)" class="fa  addBtn" aria-hidden="true">+</i>
								</td>
								<td>
									<p class="totalPrice">{{tabledatas.price*tabledatas.num | moneyFiler}}</p>
								</td>
								<td class="gongneng">
									<p class="deletegoods" @click="alertRadio(index)">删除</p>
									<p @click="alertmovesSavegoods(index)">移到我的收藏</p>
									<template v-if="tabledatas.saveandremove">
										<p @click="tabledatas.saveandremove = false">加入收藏</p>
									</template>
									<template v-else>
										<p :class="{'saveCheck':!tabledatas.saveandremove}" @click="tabledatas.saveandremove = true">取消收藏</p>
									</template>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="row tablefooter">
						<template>
							<el-checkbox style="padding-left:16px" @change="checkedAllBtn(checkedAll)" v-model="checkedAll">全选</el-checkbox>
						</template>
						<span class="removeMuch" @click="alertMuch">删除选中的商品或服务</span>
						<span class="removeSaves" @click="alertMuchgoods">移到我的收藏</span>
						<span class="servicenum">已选择<span class="goodsNum">{{goodsNum}}</span>件商品<span class="goodsNum">{{serviceNum}}</span>项服务</span>
						<span class="totalclassPoin">总价：<span class="totalMoneyClass">{{totalMoney | moneyFiler}}</span></span>
						<span @click="saveData" class="SettlementBtn">去结算</span>
					</div>
				</div>
			</div>
		</div>
		<!--js类引用-->
		<script type="text/javascript" src="{{ url('/home/shop/order/js/vue/vue.min.js') }}" ></script>
		<script type="text/javascript" src="{{ url('/home/shop/order/js/eleme-ui/index.js') }}" ></script>
		<script type="text/javascript" src="{{ url('/home/shop/order/js/ShoppingCart.js') }}" ></script>
	</body>

</html>