<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\data_rest;
use App\Models\data_user_detail;
use Illuminate\Support\Facades\Redis;
use Session;

class ShopIsLogin
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

            $user_id = session('home_user')->id;

            $rest = Redis::hget('home_user_rest',$user_id);
            Session::put('home_user_rest',json_decode($rest));

            $detail = Redis::hget('home_user_detail',$user_id);
            Session::put('home_user_detail',json_decode($detail));

            if($rest && $detail){
                return $next($request);
            }else{

                $rest = data_rest::where('user_id',$user_id)->first();
                if(!$rest){
                    return redirect('/shop/register');
                }
                Redis::hmset('home_user_rest',[$user_id=>$rest]);
                Session::put('home_user_rest',$rest);

                $detail = data_user_detail::where('user_id',$user_id)->first();
                Redis::hmset('home_user_detail',[$user_id=>$detail]);
                Session::put('home_user_detail',$detail);

                return $next($request);
            }
            
        }else{
            return redirect('/login')->with('errors','请先登录');
        }
    }
}
