<?php

namespace App\Http\Controllers\Home\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_address_town;
use App\Models\data_user;
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

    	$food = $food->data_rest_food()->paginate(10);

    	return view('home.shop.shop_photos', compact('food','id'));
    }

    public function details()
    {   
        return 1;
    }

    public function comment($id)
    {  
        $rest = data_rest::where('user_id',$id)->first();

        $users = \DB::table('data_rest_comments')
            ->join('data_users', 'data_users.id', '=', 'data_rest_comments.user_id')
            ->join('data_rests', 'data_rests.user_id', '=', 'data_rest_comments.rest_id')
            ->select('data_rest_comments.*', 'data_users.name', 'data_users.avatar', 'data_rests.name as rname' )
            ->where('data_rests.user_id', $id)
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

        
        $min = $number / $num;
        $max = 10 - $min;


        return view('home.shop.comment',['users'=>$users,'rest'=>$rest,'min'=>$min,'max'=>$max,'num'=>$num,'val'=>$val,'id'=>$id]);
    }

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


