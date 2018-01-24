<?php

namespace App\Http\Middleware;

use App\Models\data_admin_addr;
use Closure;

class HasRole
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

//        $route = \Route::current();

//        1. 获取当前用户访问的路由对应的控制器和方法名
          $route =  \Route::current()->uri();
//        dd($route);
//        2. 获取当前用户拥有的权限  用户跟角色有关系   角色跟权限有关系
          $user = data_admin_addr::find(session('admin_user')->id);
//          dd($user);

//           通过当前用户找到当前用户拥有的角色
          $roles = $user->roles;
//          dd($roles);
//            通过角色找权限
//        定义一个变量存放当前用户拥有的所有权限  (当用户登录时就应该把当前用户拥有的权限保存到缓存中)
          $arr = [];
//        每次获取一个权限
          foreach ($roles as $v){
//              获取当前角色的权限列表
            $pers = $v->permission()->get();
            //dd($pers);
            //遍历当前权限列表，获取某条权限的permission_des字段
            foreach ($pers as $m){
                $arr[] = $m->permission_des;
             }

          }
//          dd($arr);
//        全掉当前用户拥有的权限的重复项
        $own_pers = array_unique($arr);
//        dd($own_pers);
//        3. 判断单钱访问的路由对应的控制器和方法名是否在用户拥有的权限中，如果在，中间件跳过，执行路由对应的方法；如果不在，不能执行对应的控制器方法
//        判断当前访问的路由是否在拥有拥有的权限路由中
        if(in_array(trim($route),$own_pers)){
            return $next($request);
        }else{
            return redirect('auth');
        }
    }
}
