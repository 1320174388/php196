<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\data_rest;
use App\Models\data_user_detail;
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
        if(session('home_user')){

            $user_id = session('home_user')->id;

            $rest = data_rest::where('user_id',$user_id)->first();
            Session::put('home_user_rest',$rest);

            $detail = data_user_detail::where('user_id',$user_id)->first();
            Session::put('home_user_detail',$detail);

            return $next($request);
        }else{
            return redirect('/login')->with('errors','请先登录');
        }
    }
}
