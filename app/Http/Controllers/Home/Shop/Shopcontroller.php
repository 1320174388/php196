<?php

namespace App\Http\Controllers\Home\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_address_town;
use App\Models\data_user;
use Illuminate\Support\Facades\Redis;
use App\Models\data_user_cart;
use App\Models\data_rest_food;
use App\Models\data_rest;
use App\Models\data_order;
use App\FunClass\ShopClass;

class Shopcontroller extends Controller
{
    public function index($id)
    {

    	$address = data_address_town::find($id);

    	$name = $address->name; // 获取地址名称

		$rest = $address->data_rest()->get();
		// dd($rest);
    	return view('home.shop.index', compact('name', 'rest'));
    }

    public function buy($id)
    {
    	$food = data_user::where('id', $id)->first();

    	$food = $food->data_rest_food()->paginate(8);

    	return view('home.shop.shop_photos', compact('food'));
    }
    // 执行 ajax 购物车添加 操作
    public function details(Request $request)
    {

        $food_id = $request->input('food_id');
        $user_id = $request->input('user_id');

        if(!$user_id)
        {
            return 0;
        }

        $data_user_cart = data_user_cart::where('food_id',$food_id);
        $rows = $data_user_cart->first();

        if($rows){
            $number = $rows->number + 1;
            $data_user_cart->delete();
        }else{
            $number = 1;
        }
        
 
        $rest = new data_user_cart;
        
        $rest->food_id = $food_id;
        $rest->user_id = $user_id;
        $rest->number = $number;

        $food_price = data_rest_food::where('id',$food_id)->first()->price;
        $rest->price = $food_price * $number;

        $res = $rest->save();



        if($res){
            $arr = \DB::table('data_user_carts')->select('data_user_carts.food_id', 'data_rest_foods.name','data_user_carts.number','data_user_carts.price')
                                                ->leftJoin('data_rest_foods', 'food_id', '=', 'id')
                                                ->where('data_user_carts.user_id',$user_id)
                                                ->get()->toArray();
            $price = ShopClass::Total_price($arr);
            $num = ShopClass::Total_num($arr);
            return ['price'=>$price,'num'=>$num,'arr'=>$arr];
        }else{
            return 2;
        }

    }
    // 执行 ajax 购物车修改 操作
    public function addfood(Request $request){

        $food_id = $request->input('food_id');
        $user_id = $request->input('user_id');

        if(!$user_id)
        {
            return 0;
        }

        $data_user_cart = data_user_cart::where('food_id',$food_id);
        $rows = $data_user_cart->first();


        if($rows){
            $number = $rows->number + 1;
            $food_price = data_rest_food::where('id',$food_id)->first()->price;
            $food_price = $food_price * $number;

            $res = \DB::table('data_user_carts')->where('food_id',$food_id)->update(['number'=>$number,'price'=>$food_price]);
        }else{
            $number = 1;
        }

        if($res){
            $arr = \DB::table('data_user_carts')->select('data_user_carts.food_id', 'data_rest_foods.name','data_user_carts.number','data_user_carts.price')
                                                ->leftJoin('data_rest_foods', 'food_id', '=', 'id')
                                                ->where('data_user_carts.user_id',$user_id)
                                                ->get()->toArray();
            $price = ShopClass::Total_price($arr);
            $num = ShopClass::Total_num($arr);
            return ['price'=>$price,'num'=>$num,'arr'=>$arr];
        }else{
            return 2;
        }
    }

    // 执行 ajax 购物车删除 操作
    public function delfood(Request $request){

        $food_id = $request->input('food_id');
        $user_id = $request->input('user_id');

        if(!$user_id)
        {
            return 0;
        }

        $data_user_cart = data_user_cart::where('food_id',$food_id);
        $rows = $data_user_cart->first();

        if($rows->number > 1){
            $number = $rows->number - 1;

            $food_price = data_rest_food::where('id',$food_id)->first()->price;
            $food_price = $food_price * $number;

            $res = \DB::table('data_user_carts')->where('food_id',$food_id)->update(['number'=>$number,'price'=>$food_price]);
        }else{
            $res = $data_user_cart->delete();
        }

        if($res){
            $arr = \DB::table('data_user_carts')->select('data_user_carts.food_id', 'data_rest_foods.name','data_user_carts.number','data_user_carts.price')
                                                ->leftJoin('data_rest_foods', 'food_id', '=', 'id')
                                                ->where('data_user_carts.user_id',$user_id)
                                                ->get()->toArray();
            if($arr){
                $price = ShopClass::Total_price($arr);
                $num = ShopClass::Total_num($arr);
                return ['price'=>$price,'num'=>$num,'arr'=>$arr];
            }else{
                return 1;
            }
        }else{
            return 2;
        }
    }

    public function settle(Request $request)
    {
        $pricez = $request->input('price');
        $user_id = $request->input('user_id');

        $arr = \DB::table('data_user_carts')->select('data_user_carts.food_id', 'data_rest_foods.name','data_user_carts.number','data_user_carts.price','data_rest_foods.img','data_rest_foods.user_id as rest_id')
                                                ->leftJoin('data_rest_foods', 'food_id', '=', 'id')
                                                ->where('data_user_carts.user_id',$user_id)->get();
        // dd($arr);
        $food_data = $arr->toArray();
        // dd($food_data);
        $food_user_id = $food_data[0]->rest_id;
        $arrdp = data_rest::where('user_id',$food_user_id)->first();
        // dd($arrdp);
        $arruser = data_user::where('id',$food_user_id)->first();
        // dd($rests);
        // dd($yhid);
        $arrdz = \DB::table('data_user_addrs')->where('user_id',$user_id)->get();
        // dd($arrdz);

        return view('home.shop.order', compact('arr','pricez','user_id','arrdz','arrdp','arruser','food_user_id','food_data'));
    }

    public function orderss(Request $request)
    {   

        $this->validate($request,[
            'address'=>'required',
            'text' => 'max:30',
        ],[
            'address.required' => '请选择收货地址',
            'text.max' => '留言请不要超过30个字符',
        ]);

        $order = $request->except('_token','arrdp','number','food_id','food_number','food_price');
        $order['order_number'] = mt_rand(1000,3000).time().mt_rand(1000,9999);
        $order['order_time'] = date('Y-m-d H:i:s',time());
        $order['status'] = 0;
        $order['text'] = '用户没有留言';
        // dd($order);

        $details = $request->except('_token','user_id','rest_id','price','arrdp','number','text','address');
        $data = [];
        foreach($details['food_id'] as $k=>$v){
            $data[$k]['food_id'] = $v;
            $data[$k]['food_num'] = $details['food_number'][$k];
            $data[$k]['price'] = $details['food_price'][$k];
            $data[$k]['order_number'] = $order['order_number'];
        }
        // dd($data);
        \DB::beginTransaction();

        $cart = data_user_cart::where('user_id',$request->input('user_id'))->delete();

        $data_order = new data_order;
        foreach($order as $k=>$v){
            $data_order->$k = $v;
        }
        $order_row = $data_order->save();
        $details_row = \DB::table('data_order_details')->insert($data);
        
        if($cart && $order_row && $details_row){
            \DB::commit();
            return redirect('/');
        }else{
            \DB::rollback();
            return back();
        }

    }

}