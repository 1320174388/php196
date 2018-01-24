<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_food_cate;
use App\Models\data_rest_food;
use App\FunClass\ShopClass;
use Illuminate\Support\Facades\Redis;
use Validator;

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

            if($id 、== 1){
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

            if($id == 1){
                return back()->with('shop_error_1','1');
            }

            $data = data_food_cate::where('pid',$id)->first();

            if($data){
                return back()->with('shop_error_2','1');
            }

            $data = data_food_cate::where('id',$id)->first();
            $data = $data->data_rest_food()->get();

            if($data){
                return back()->with('shop_error_3','1');
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
    public function webSet(Request $request){

        $name = $request->input('name') ? $request->input('name') : '';
        $cate_id = $request->input('cate_id');
        $min = $request->input('min') ? $request->input('min') : 0;
        $max = $request->input('max') ? $request->input('max') : 100;
        $id = session('home_user')->id;

        $cate = data_food_cate::wherein('user_id',[0,$id])->get();

        if(!$cate_id || $cate_id[0] == 1){
            $cate_id = [];
            foreach($cate as $v){
                $cate_id[] = $v->id;
            }
        }

        if($min > $max){
            $res = $min;
            $min = $max;
            $max = $res;
        }

        $food = data_rest_food::where('user_id',$id)
                              ->where('name','like','%'.$name.'%')
                              ->wherein('cate_id',$cate_id)
                              ->where('price','>',$min)
                              ->where('price','<',$max)
                              ->paginate(4);

        if($cate && $food){
            $parent = ShopClass::children($cate);
            return view('shop.webSet',[
                'parent'=>$parent,
                'food'=>$food,
                'where'=>[
                    'name'=>$name,
                    'cate_id'=>$cate_id,
                    'min'=>$min,
                    'max'=>$max,
                ],
            ]);
        }elseif($cate){
            $parent = ShopClass::children($cate);
            return view('shop.webSet',['parent'=>$parent]);
        }else{
            return view('shop.webSet');
        }
    }
    // 添加食品
    public function dowebSet(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'avatar' => 'required|image',
            'price' => 'required|numeric',
        ],[
            'name.required' => '请填写食品名称 ',
            'avatar.required' => '请上传头像',
            'avatar.image' => '请上传正经头像',
            'price.required' => '请填写价格',
            'price.numeric' => '餐品价格只能是数字',
        ]);

        $file = ShopClass::doUpload($request);

        $data = $request->except('_token','avatar');
        $data['img'] = $file;
        $data['user_id'] = session('home_user')->id;

        $food = new data_rest_food;

        foreach($data as $k=>$v){
            $food->$k = $v;
        }
        $res = $food->save();

        if($res){
            return redirect('shop/admin/webSet');
        }else{
            return back();
        }

    }
    // 修改食品
    public function webEdit(Request $request,$id){

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'avatar' => 'image',
        ],[
            'name.required' => '请填写食品名称 ',
            'avatar.image' => '请上传正经头像',
        ]);

        if ($validator->fails()) {
            return redirect('shop/admin/webSet')->withErrors($validator);
        }

        $data = $request->except('_token','avatar');

        if($request->all('avatar')){
            $file = ShopClass::doUpload($request);
            $data['img'] = $file;
        }

        if(!$data['img']){
            unset($data['img']);
        }

        $food = data_rest_food::find($id);

        foreach($data as $k=>$v){
            $food->$k = $v;
        }
        $res = $food->save();

        if($res){
            return redirect('shop/admin/webSet');
        }else{
            return back();
        }

    }
    // 删除食品
    public function webDel($id){
        $food = data_rest_food::find($id);
        $res = $food->delete();
        if($res){
            return redirect('shop/admin/webSet');
        }else{
            return back();
        }
    }
}
