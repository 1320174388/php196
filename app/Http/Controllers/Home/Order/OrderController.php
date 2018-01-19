<?php

namespace App\Http\Controllers\Home\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class OrderController extends Controller
{



	//拿到购买的商品的店家id，食品id，


    //把购买的食品以数组的形式存入session

	//显示一个订单页

	//遍历


	public function toCart(Request $request)
	{

			$data = $request->session()->all();
			
		    $shop_count = $request ->input('count','');
		    // 如果当前用户已经登录
		    $member = $request ->session()->get('member','');
		    if($member !=''){
		        $cart_items = Cart::where('member_id',$member->id)->get();
		        $exist = false; // 用于标注COOKIE中的数据是否存在于数据库
		        foreach($cart_items as $cart_item){
		            // 判断末登录时购物车中product_id 是否存在 数据库中
		            if($cart_item->product_id == $aid){
		                // 判断$shop_count是否为空如果为空默认+1，不为空就是$shop_count数量
		                $shop_count !=''? $cart_item -> count = $shop_count : $cart_item -> count ++ ;
		                $cart_item -> save();
		                $exist = true;
		                break;
		            }
		        }
		        // 如果不存在数据库中，就添加进数据库
		        if($exist == false){
		            $cart_item = new Cart();
		            $cart_item ->product_id = $aid;
		            $cart_item ->count = 1;
		            $cart_item ->member_id = $member->id;
		            $cart_item ->save();
		        }
		        return json_encode('添加成功！');
		    }
		    // 用户没有登录的情况下
		    $shop_cart = $request->cookie('shop_cart');
		    $shop_cart_arr = ($shop_cart != null ? explode(',',$shop_cart) : array());
		    $count = 1; // 商品默认数据
		    foreach($shop_cart_arr as &$value){ // 一定要传引用
		        $index = strrpos($value,':'); // 商品个数
		        if(substr($value,0,$index) == $aid){
		            // 判断$shop_count是否为空如果为空默认+1，不为空就是$shop_count数量
		            $count = $shop_count !=''? $shop_count : ((int) substr($value,$index + 1)) + 1;
		           // $count =((int) substr($value,$index + 1)) + 1; // 商品数量+1;
		            $value = $aid. ":".$count; // 改变购物车商品的数量
		            break;
		        }
		    }
		    // $conut是否 = 1  如果是就把商品加入到数组中
		    if($count == 1){
		        array_push($shop_cart_arr,$aid.":".$count);
		    }
		    $msg = $shop_count != '' ? '修改成功！' : '添加成功！';
		    return response(json_encode($msg))->withCookie('shop_cart',implode(',',$shop_cart_arr));
}
		select * from blog_user where user_name like '%a%'
		$data = User::orderBy('user_id', 'asc')->paginate();
		$input = $request->only('keyword');

		$data = User::where('user_nmae', 'like', '%'.$input['keyword'].'%');
		return view('admin.user.ligt', compact('data', 'input'));



	}
}

$.post('{{ url('cate/changeorder') }}', {'_token':"{{ csrf_token() }}", 'cate_id':id, 'cate_order':v}, function);



public function changeOrder()
{
	//排序业务逻辑
	$input = $request->except('_token');

	//找到要修改的那条记录
	$cate = Cate::find($input['cate_id']);

	//修改这条记录
	$res = $cate->update(['cate_order' => $input['cate_order']]);

	if($res){
		$data = [
			'status' => 0,
			'msg' => '修改成功'
		];
	}else{
		$date = [
			'status' => 1,
			'msg' => '修改失败'
		];
	}
	return $data;
}