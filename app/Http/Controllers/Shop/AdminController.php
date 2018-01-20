<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
    	return view('shop.index');
    }

    public function userInfo(){
    	return view('shop.userInfo');
    }

    public function identify(){
    	return view('shop.identify');
    }

    public function webSet(){
    	return view('shop.webSet');
    }

}
