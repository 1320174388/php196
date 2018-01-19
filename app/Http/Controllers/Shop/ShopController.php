<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_address_province;
use App\Models\data_rest;

class ShopController extends Controller
{
    public function register(){

    	// 获取所有省份信息
    	$province = data_address_province::get(); 
		// 获取当前省的信息
    	$pro_addr = data_address_province::find(1); 
    	// 获取所有城市的信息
    	$city = $pro_addr->data_address_city()->get(); 
    	// 获取当前城市的信息
    	$city_addr = $pro_addr->data_address_city()->first();
		// 获取所有区县的信息
    	$town = $city_addr->data_address_town()->get(); 

    	return view('shop.register',['province'=>$province,'city'=>$city,'town'=>$town,'town'=>$town]);
    }

    public function doreg(Request $request){

        $this->validate($request,[
            'name' => 'required|max:20',
            'nameid' => 'required|max:4',
            'numberid' => 'required|min:18|max:18',
            'phone' => ['required','min:11','max:11','regex:/1[0-9]{9}/'],
            'introduce' => 'required',
        ],[
            'name.required' => '请输入店铺名称',
            'name.max' => '请输入一个正经店名!',
            'nameid.required' => '请输入真实姓名',
            'nameid.max' => '请输入真实姓名',
            'numberid.required' => '请输入合法身份证号',
            'numberid.min' => '请输入合法身份证号',
            'numberid.max' => '请输入合法身份证号',
            'phone.required' => '请输入正确手机号码',
            'phone.min' => '请输入正确手机号码',
            'phone.max' => '请输入正确手机号码',
            'phone.regex' => '请输入正确手机号码',
            'introduce.required' => '请输入店铺详情',
        ]);

        $data = $request->except('_token');

        $user = data_rest::where('user_id',$data['user_id'])->first();

        if($user){
            return view('shop.noapply');
        }
        
        $rest = new data_rest;
        $rest->name = $data['name'];
        $rest->user_id = $data['user_id'];
        $rest->cityCode = $data['cityCode'];
        $rest->nameid = $data['nameid'];
        $rest->numberid = $data['numberid'];
        $rest->phone = $data['phone'];
        $rest->status = 1;
        $rest->introduce = $data['introduce'];
        $res = $rest->save();

        if($res){
            return view('shop.apply');
        }
    }
}
