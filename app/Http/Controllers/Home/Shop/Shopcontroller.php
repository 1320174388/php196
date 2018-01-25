<?php

namespace App\Http\Controllers\Home\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_address_town;
use App\Models\data_user;
use Illuminate\Support\Facades\Redis;
use App\Models\data_user_cart;
use App\Models\data_rest_food;

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

        $res = $rest->save();

        if($res){
            $arr = \DB::table('data_user_carts')->select('data_user_carts.food_id', 'data_rest_foods.name','data_user_carts.number')
                                                ->leftJoin('data_rest_foods', 'food_id', '=', 'id')
                                                ->get()->toArray();
            return $arr;
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
            $res = \DB::table('data_user_carts')->where('food_id',$food_id)->update(['number'=>$number]);
        }else{
            $number = 1;
        }

        if($res){
            $arr = \DB::table('data_user_carts')->select('data_user_carts.food_id', 'data_rest_foods.name','data_user_carts.number')
                                                ->leftJoin('data_rest_foods', 'food_id', '=', 'id')
                                                ->get()->toArray();
            return $arr;
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
            $res = \DB::table('data_user_carts')->where('food_id',$food_id)->update(['number'=>$number]);
        }else{
            $res = $data_user_cart->delete();
        }

        if($res){
            $arr = \DB::table('data_user_carts')->select('data_user_carts.food_id', 'data_rest_foods.name','data_user_carts.number')
                                                ->leftJoin('data_rest_foods', 'food_id', '=', 'id')
                                                ->get()->toArray();
            if($arr){
                return $arr;
            }else{
                return 1;
            }
        }else{
            return 2;
        }
    }

}
