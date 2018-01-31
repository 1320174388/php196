<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_order;
use App\Models\data_order_detail;

class OrderController extends Controller
{
	// 提交的订单
    public function index(Request $request){
    	$rest_id = session('home_user')->id; //获取当前店主的id

    	$order_number = $request->input('order_number');
    	$name = $request->input('name');
    	$order_time = $request->input('order_time');

    	$order = \DB::table('data_orders')->select('data_orders.*','.name')
                                          ->leftJoin('data_users', 'datadata_users_orders.user_id','=','data_users.id')
                                          ->where('data_orders.rest_id',$rest_id)
                                          ->where('data_orders.status',0)
                                          ->where('data_orders.order_number','like',"%".$order_number."%")
                                          ->where('data_users.name','like',"%".$name."%")
                                          ->where('data_orders.order_time','like',"%".$order_time."%")
                                          ->paginate(6);

    	return view('shop.order_index',[
    		'order'=>$order,
    		'where'=>[
    			'order_number' => $order_number,
    			'name' => $name,
    			'order_time' => $order_time,
    		]
    	]);
    }
    // 订单详情
    public function detail(Request $request){
    	$order_number = $request->input('order_number');
    	$detail = \DB::table('data_order_details')->select('data_rest_foods.name','data_order_details.food_num','data_order_details.price')
                                                ->leftJoin('data_rest_foods', 'data_rest_foods.id','=','data_order_details.food_id')
                                                ->where('data_order_details.order_number',$order_number)
                                                ->get()->toArray();
    	return $detail;
    }
    // 处理订单提交
    public function edit(Request $request){
    	$order_number = $request->input('order_number');
    	$order = data_order::where('order_number',$order_number)->first();
    	$order->status = 1;
    	$res = $order->save();
    	if($res){
    		return 1;
    	}else{
    		return 0;
    	}
    }
    // 处理中订单
    public function handle(Request $request){
    	$rest_id = session('home_user')->id; //获取当前店主的id

    	$order_number = $request->input('order_number');
    	$name = $request->input('name');
    	$order_time = $request->input('order_time');

    	$order = \DB::table('data_orders')->select('data_orders.*','data_users.name')
                                          ->leftJoin('data_users', 'data_orders.user_id','=','data_users.id')
                                          ->where('data_orders.rest_id',$rest_id)
                                          ->where('data_orders.status',1)
                                          ->where('data_orders.order_number','like',"%".$order_number."%")
                                          ->where('data_users.name','like',"%".$name."%")
                                          ->where('data_orders.order_time','like',"%".$order_time."%")
                                          ->paginate(6);

    	return view('shop.order_handle',[
    		'order'=>$order,
    		'where'=>[
    			'order_number' => $order_number,
    			'name' => $name,
    			'order_time' => $order_time,
    		]
    	]);
    }
    // 完成订单
    public function show(Request $request){
    	$rest_id = session('home_user')->id; //获取当前店主的id

    	$order_number = $request->input('order_number');
    	$name = $request->input('name');
    	$order_time = $request->input('order_time');

    	$order = \DB::table('data_orders')->select('data_orders.*','data_users.name')
                                          ->leftJoin('data_users', 'data_orders.user_id','=','data_users.id')
                                          ->where('data_orders.rest_id',$rest_id)
                                          ->where('data_orders.status',2)
                                          ->where('data_orders.order_number','like',"%".$order_number."%")
                                          ->where('data_users.name','like',"%".$name."%")
                                          ->where('data_orders.order_time','like',"%".$order_time."%")
                                          ->paginate(6);

    	return view('shop.order_show',[
    		'order'=>$order,
    		'where'=>[
    			'order_number' => $order_number,
    			'name' => $name,
    			'order_time' => $order_time,
    		]
    	]);
    }
}
