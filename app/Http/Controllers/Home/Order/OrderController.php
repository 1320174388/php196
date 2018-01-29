<?php

namespace App\Http\Controllers\Home\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\data_order;
use App\Models\data_order_detail;

class OrderController extends Controller
{
	public function neworder()
	{	
		$user_id = session('home_user')->id;

		$order = \DB::table('data_orders')->select('data_orders.*','data_users.name')
                                          ->leftJoin('data_users', 'data_orders.user_id','=','data_users.id')
                                          ->where('data_orders.user_id',$user_id)
                                          ->where('data_orders.status',0)
                                          ->paginate(6);

		return view('home.order.neworder', compact('order'));

	}

	public function overorder()
	{	

		$user_id = session('home_user')->id;

		$order = \DB::table('data_orders')->select('data_orders.*','data_users.name')
                                          ->leftJoin('data_users', 'data_orders.user_id','=','data_users.id')
                                          ->where('data_orders.user_id',$user_id)
                                          ->where('data_orders.status',2)
                                          ->paginate(6);

		return view('home.order.overorder', compact('order'));
	}

	 public function detail(Request $request){
    	$order_number = $request->input('order_number');
    	$detail = \DB::table('data_order_details')->select('data_rest_foods.name','data_order_details.food_num','data_order_details.price')
                                                ->leftJoin('data_rest_foods', 'data_rest_foods.id','=','data_order_details.food_id')
                                                ->where('data_order_details.order_number',$order_number)
                                                ->get()->toArray();
    	return $detail;
    }


    public function handle()
    {
    	$user_id = session('home_user')->id;

		$order = \DB::table('data_orders')->select('data_orders.*','data_users.name')
                                          ->leftJoin('data_users', 'data_orders.user_id','=','data_users.id')
                                          ->where('data_orders.user_id',$user_id)
                                          ->where('data_orders.status',1)
                                          ->paginate(6);

		return view('home.order.handle', compact('order'));
    }

    // 处理订单提交
    public function edit(Request $request){
    	$order_number = $request->input('order_number');
    	$order = data_order::where('order_number',$order_number)->first();
    	$order->status = 2;
    	$res = $order->save();
    	if($res){
    		return 1;
    	}else{
    		return 0;
    	}
    }


}

