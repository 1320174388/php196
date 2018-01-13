<?php

namespace App\Http\Controllers\Home\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index(){
    	return view('home.page.index');
    }
}
