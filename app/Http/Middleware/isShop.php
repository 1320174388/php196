<?php

namespace App\Http\Middleware;

use Closure;

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
        if(session('home_user_rest')->status == 0){
            return response()->view('shop.disable');
        }else if(session('home_user_rest')->status == 1){
            // dd(143);
            return response()->view('shop.apply');
        }else{
            return $next($request);
        }
    }
}
