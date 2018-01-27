<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_order;
use App\Models\data_order_detail;

class OrderController extends Controller
{
	// 提交的订单
    public function index(){
    	$rest_id = session('home_user')->id; //获取当前店主的id
    	$order = data_order::where('rest_id',$rest_id)->where('status',0)->get();
    	return view('shop.order_index',['order'=>$order]);
    }
    // 订单详情
    public function detail(Request $request){
    	return 1;
    }
}
