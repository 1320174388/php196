<?php

namespace App\Http\Controllers\Home\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\data_order;
use App\Models\data_order_detail;

class OrderController extends Controller
{

	// public function toCart(Request $request)
	// {

	// 		$data = $request->session()->all();
			
	// 	    $shop_count = $request ->input('count','');
	// 	    // 如果当前用户已经登录
	// 	    $member = $request ->session()->get('member','');
	// 	    if($member !=''){
	// 	        $cart_items = Cart::where('member_id',$member->id)->get();
	// 	        $exist = false; // 用于标注COOKIE中的数据是否存在于数据库
	// 	        foreach($cart_items as $cart_item){
	// 	            // 判断末登录时购物车中product_id 是否存在 数据库中
	// 	            if($cart_item->product_id == $aid){
	// 	                // 判断$shop_count是否为空如果为空默认+1，不为空就是$shop_count数量
	// 	                $shop_count !=''? $cart_item -> count = $shop_count : $cart_item -> count ++ ;
	// 	                $cart_item -> save();
	// 	                $exist = true;
	// 	                break;
	// 	            }
	// 	        }
	// 	        // 如果不存在数据库中，就添加进数据库
	// 	        if($exist == false){
	// 	            $cart_item = new Cart();
	// 	            $cart_item ->product_id = $aid;
	// 	            $cart_item ->count = 1;
	// 	            $cart_item ->member_id = $member->id;
	// 	            $cart_item ->save();
	// 	        }
	// 	        return json_encode('添加成功！');
	// 	    }
	// 	    // 用户没有登录的情况下
	// 	    $shop_cart = $request->cookie('shop_cart');
	// 	    $shop_cart_arr = ($shop_cart != null ? explode(',',$shop_cart) : array());
	// 	    $count = 1; // 商品默认数据
	// 	    foreach($shop_cart_arr as &$value){ // 一定要传引用
	// 	        $index = strrpos($value,':'); // 商品个数
	// 	        if(substr($value,0,$index) == $aid){
	// 	            // 判断$shop_count是否为空如果为空默认+1，不为空就是$shop_count数量
	// 	            $count = $shop_count !=''? $shop_count : ((int) substr($value,$index + 1)) + 1;
	// 	           // $count =((int) substr($value,$index + 1)) + 1; // 商品数量+1;
	// 	            $value = $aid. ":".$count; // 改变购物车商品的数量
	// 	            break;
	// 	        }
	// 	    }
	// 	    // $conut是否 = 1  如果是就把商品加入到数组中
	// 	    if($count == 1){
	// 	        array_push($shop_cart_arr,$aid.":".$count);
	// 	    }
	// 	    $msg = $shop_count != '' ? '修改成功！' : '添加成功！';
	// 	    return response(json_encode($msg))->withCookie('shop_cart',implode(',',$shop_cart_arr));

	// 	    		select * from blog_user where user_name like '%a%'
	// 			$data = User::orderBy('user_id', 'asc')->paginate();
	// 			$input = $request->only('keyword');

	// 			$data = User::where('user_nmae', 'like', '%'.$input['keyword'].'%');
	// 			return view('admin.user.ligt', compact('data', 'input'));
	// }

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

