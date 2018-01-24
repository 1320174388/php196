<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_rest;
use App\Models\data_user;


class ShopController extends Controller
{
	//显示一个店铺视图
    public function index(Request $request)
    {
    	
        //获取所有店铺信息
        //获取需要查询的值
         $name = $request->input('name','');
        $user_id = $request->input('user_id','');
        $status = $request->input('status','');
        $num = $request->input('num',5);
        if($user_id ==''){
        $user = data_user::where('name','like','%'.$user_id.'%')->get();
        }
        $user_id = [];
        foreach($user as $k=>$v){
            $user_id[] = $v->id;
        }

        //查询
    	$shop = data_rest::where('name','like','%'.$name.'%')->whereIn('user_id',$user_id)->where('status','like','%'.$status.'%')->paginate($num);
    	foreach($shop as $k=>$v){
    		$v->address = $v->data_address_town->name;
    		$v->user_name = $v->data_user->name;
    	}

        //显示一个视图并把他发给前台
    	return view('admin.shop.glylist',['shop'=>$shop,'where'=>['name'=>$name,'user_id'=>$user_id,'status'=>$status,'num'=>$num]]);
        
    }




    //ajax
    public function list(Request $request)
    {
    	$id = $request['id'];
        
    	$user = data_rest::where('user_id',$id)->first();

    	if($user->status == 0 ){
    		$user->status = 2;
    		$user->save();
    		return 0;
    	}elseif($user->status == 1 ){
    		$user->status = 2;
    		$user->save();
    		return 1;
    	}elseif($user->status == 2){
    		$user->status = 0;
    		$user->save();
    		return 2;
    	}

    }

    public function del(Request $request)
    {
        $id = $request['id'];
        $user = data_rest::where('user_id',$id)->first();
        $user->delete();
        return 1;
    }



    //显示一个店铺详情
    public function details(Request $request)
    {
    	$id = $request['id'];

    	$user = data_rest::where('user_id',$id)->first();
    	$user->address = $user->data_address_town->name;
    	$user->user_name = $user->data_user->name;
    	$str = '';
    	if($user->status == 0){
    		$str = '禁用';
    	}else if($user->status == 1){
    		$str = '等待审核';
    	}else if($user->status == 2){
    		$str = '已有店铺';
    	}

    	$arr[0] = $user->name;
    	$arr[1] = $user->user_name;
    	$arr[2] = $user->address;
    	$arr[3] = $user->nameid;
    	$arr[4] = $user->numberid;
    	$arr[5] = $user->phone;
    	$arr[6] = $str;
    	$arr[7] = $user->introduce;

    	return $arr;
    }





}
