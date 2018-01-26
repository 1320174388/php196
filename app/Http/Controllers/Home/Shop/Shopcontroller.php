<?php

namespace App\Http\Controllers\Home\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_address_town;
use App\Models\data_user;
use Illuminate\Support\Facades\Redis;
use App\Models\data_user_cart;
use App\Models\data_rest_food;
use App\FunClass\ShopClass;
use App\Models\data_rest;
use App\Models\data_rest_comment;

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

    	return view('home.shop.shop_photos', compact('food','id'));
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
    // 评论
    public function comment($id)
    {  
        $rest = data_rest::where('user_id',$id)->first();

        $users = \DB::table('data_rest_comments')
            ->join('data_users', 'data_users.id', '=', 'data_rest_comments.user_id')
            ->join('data_rests', 'data_rests.user_id', '=', 'data_rest_comments.rest_id')
            ->select('data_rest_comments.*', 'data_users.name', 'data_users.avatar', 'data_rests.name as rname' )
            ->where('data_rests.user_id', $id)
            ->orderBy('id','desc')
            ->paginate(10);

        $obj = data_rest_comment::where('user_id',$id)->get();
        $arr = $obj->toArray();
        $num = count($arr);

        $number = 0;
        $num_arr = [];
        foreach($obj as $k=>$v){
            $num_arr[$k] = $v->status;
            $number += $v->status;
        }
        
        $val = array_count_values($num_arr);
        if(!isset($val[2])){
            $val[2] = 0;
        }
        if(!isset($val[4])){
            $val[4] = 0;
        }
        if(!isset($val[6])){
            $val[6] = 0;
        }
        if(!isset($val[8])){
            $val[8] = 0;
        }
        if(!isset($val[10])){
            $val[10] = 0;
        }

        if($number){
            $min = $number / $num;
            $max = 10 - $min; 
        }else{
            $min = 0;
            $max = 10;
            $num = 1;
        }

        return view('home.shop.comment',['users'=>$users,'rest'=>$rest,'min'=>$min,'max'=>$max,'num'=>$num,'val'=>$val,'id'=>$id]);
        

        
    }
    // ajax 执行添加
    public function ajax(Request $request)
    {
        $all = $request->all();

        $user_id = session('home_user')->id;

        $comment = new data_rest_comment;
        $comment->user_id = $user_id;
        $comment->rest_id = $all['rid'];
        $comment->content = $all['txar'];
        $comment->status = $all['stf'];
        $comment->time = time();
        $res = $comment->save();

        if($res){
            return 1;
        }else{
            return 2;
        }

    }

}


