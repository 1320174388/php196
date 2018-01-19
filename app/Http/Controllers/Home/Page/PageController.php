<?php

namespace App\Http\Controllers\Home\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_address_province;

// 城市联动分类查询表

class PageController extends Controller
{
    public function index(){

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

    	return view('home.page.index',['province'=>$province,'city'=>$city,'town'=>$town,'town'=>$town]);
    }

    public function address(Request $request){

    	// 接收省份的ID
    	$pr = $request->input('pr');
    	$ci = $request->input('ci');

    	$province = data_address_province::get(); 
    	$pro_addr = data_address_province::find($pr);

    	$city = $pro_addr->data_address_city()->get();

    	if($ci){
    		$city_addr = $pro_addr->data_address_city()->find($ci);
    		$city_id = $city_addr->id;
    	}else{
    		$city_addr = $pro_addr->data_address_city()->first();
    		$city_id = $city_addr->id;
    	}

    	$town = $city_addr->data_address_town()->get();

    	return $data = ['city'=>$city,'town'=>$town];
    	
    }
}
