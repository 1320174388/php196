<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_address_province;

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

        $data = $request->except('_token');

    }
}
