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