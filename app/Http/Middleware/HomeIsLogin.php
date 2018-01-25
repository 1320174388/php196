<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\data_rest;
use App\Models\data_user_detail;
use Illuminate\Support\Facades\Redis;
use Session;

class HomeIsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session('home_user')){ // 判断用户
            return $next($request); 
        }else{
            return redirect('/login')->with('errors','请先登录');
        }
    }
}
