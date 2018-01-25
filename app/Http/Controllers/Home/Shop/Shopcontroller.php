<?php

namespace App\Http\Controllers\Home\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_address_town;
use App\Models\data_user;

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

    	return view('home.shop.shop_photos', compact('food'));
    }

    public function details()
    {   
        return 1;
    }

}
