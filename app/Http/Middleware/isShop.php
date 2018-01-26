<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;

class isShop
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
        $user_id = session('home_user')->id;

        $rest = Redis::hget('home_user_rest',$user_id);
        
        if(json_decode($rest)->status == 0){
            return response()->view('shop.disable');
        }else if(json_decode($rest)->status == 1){
            return response()->view('shop.apply');
        }else{
            return $next($request);
        }
    }
}
