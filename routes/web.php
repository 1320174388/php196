<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// 前台首页
Route::get('/','Home\Page\PageController@index');

//登录页面
Route::get('/login','Home\Login\LoginController@login');
//登录验证路由
Route::post('/login','Home\Login\LoginController@Verification');
//注册账号页面
Route::get('/register','Home\Login\LoginController@register');
//注册验证路由
Route::post('/register','Home\Login\LoginController@Prove');
//验证账号密码是否存在的路由
Route::post('/zcajax','Home\Login\LoginController@zcajax');


//验证码路由
Route::get('/code/captcha/{tmp}', 'Home\Login\LoginController@captcha');

Route::resource('/admin/user', 'Admin/UserController@index');

//后台登录页面路由
Route::get('admin/login','Admin\LoginController@login');

//登录页面的验证码
Route::get('admin/yzm','Admin\LoginController@yzm');

//登录页面的处理逻辑
Route::post('admin/dologin','Admin\LoginController@dologin');

//加密演示
Route::get('crypt','Admin\LoginController@crypt');

//session
Route::get('session','Admin\LoginController@session');

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'islogin'],function(){


//后台首页
    Route::get('index','LoginController@index');

//退出登录
    Route::get('logout','LoginController@logout');

//用户模块
    Route::resource('user','UserController');


});
