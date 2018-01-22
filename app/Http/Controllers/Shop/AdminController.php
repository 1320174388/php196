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
        $id = session('home_user')->id;

        $data = data_food_cate::wherein('user_id',[0,$id])->get();

        if($data){
            $parent = ShopClass::children($data);
            return view('shop.webSet',['parent'=>$parent]);
        }else{
            return view('shop.webSet');
        }
    }
    // 添加食品
    public function dowebSet(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'avatar' => 'required|image',
        ],[
            'name.required' => '请填写食品名称 ',
            'price.required' => '请填写价格 ',
            'price.numeric' => '价s格只能写入数字 ',
            'stock.required' => '请填写库存 ',
            'stock.numeric' => '库存只能写入数字 ',
            'avatar.required' => '请上传头像',
            'avatar.image' => '请上传正经头像',
        ]);

        $file = ShopClass::doUpload($request);

        $data = $request->except('_token','avatar');
        $data['sales'] = 0;
        $data['avatar'] = $file;



    	dd($data);
    }

    public function doUpload(Request $request) // 控制器
    {
        if($request->hasFile("upload")){ //判断是否有上传
            
            $myfile = $request->file("upload");//获取上传信息
            
            if($myfile->isValid()){ // 确认上传的文件是否成功

                $picname = $myfile->getClientOriginalName(); // 获取文件名
                $ent = $myfile->getClientOriginalExtension();// 获取扩展名
                
                $filename = time().rand(1000,9999).".".$ent; // 拼接文件名
                $myfile->move("./myuploads",$filename); // 移动上传文件
                                
                return response($filename); // 输出内容
                exit();
            }
        }
    }

}
