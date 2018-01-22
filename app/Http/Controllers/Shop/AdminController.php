<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_food_cate;
use App\FunClass\ShopClass;

class AdminController extends Controller
{
	// 店铺首页
    public function index(){
    	return view('shop.index');
    }
    // 账户管理
    public function userInfo(){
    	return view('shop.userInfo');
    }
    // 实名认证
    public function identify(){
    	return view('shop.identify');
    }
    // 食品分类
    public function addInfo(){

    	$id = session('home_user')->id;

    	$data = data_food_cate::wherein('user_id',[0,$id])->get();

    	if($data){
	    	$parent = ShopClass::children($data);
    		return view('shop.addInfo',['parent'=>$parent]);
    	}else{
    		return view('shop.addInfo');
    	}
    	
    }
    // 执行添加分类
    public function doaddInfo(Request $request){
        // 执行添加操作
    	if(!empty($request->input('add'))){

    		$this->validate($request,[
	    		'name' => 'required',
	    	],[
	    		'name.required' => '您并没有填写分类名称',
	    	]);
	    	$data = $request->except('_token','add');

	    	if(empty($data['pid'])){
	    		$data['pid'] = 1;
	    	}

	    	if($data['pid'] > 0 ){
	    		$cate = data_food_cate::where('id',$data['pid'])->first();
	    		$data['path'] = $cate['path'].'-'.$data['pid'];
	    	}else{
	    		$data['path'] = 1;
	    	}

	    	$cate = new data_food_cate;
	    	foreach($data as $v=>$k){
	    		$cate->$v = $k;
	    	}
	    	$res = $cate->save();

	    	if($res){
	    		return redirect('/shop/admin/addInfo');
	    	}else{
	    		return back();
	    	}

    	}
        // 执行修改操作
    	if(!empty($request->input('edit'))){ 

    		$this->validate($request,[
	    		'name' => 'required',
	    	],[
	    		'name.required' => '您并没有填写分类名称',
	    	]);
	    	$data = $request->except('_token');

	    	$id = $request->input('pid');

            if($id = 1){
                return back()->with('shop_error_0','1');
            }

	    	$cate = data_food_cate::where('id',$id)->first();
	    	$cate->name = $request->input('name');
	    	$res = $cate->save();

	    	if($res){
    			return redirect('/shop/admin/addInfo');
    		}else{
    			return back();
    		}
    	}
        // 执行删除操作
    	if(!empty($request->input('del'))){

    		$id = $request->input('pid');

            if($id = 1){
                return back()->with('shop_error_1','1');
            }

            $data = data_food_cate::where('pid',$id)->first();

            if($data){
                return back()->with('shop_error_2','1');
            }

    		$cate = data_food_cate::where('id',$id)->first();
    		$res = $cate->delete();

    		if($res){
    			return redirect('/shop/admin/addInfo');
    		}else{
    			return back();
    		}

    	}
    	
    }
    // 食品列表
    public function webSet(){
    	return view('shop.webSet');
    }
    // 添加食品
    public function dowebSet(){
    	dd('123123');
    }

}
