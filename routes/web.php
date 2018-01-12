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

Route::get('/', function () {
    return view('welcome');
});

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
