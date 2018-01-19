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
Route::post('/home/address','Home\Page\PageController@address');

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

//忘记密码路由
Route::get('/forget','Home\Login\LoginController@forget');

//忘记密码验证路由
Route::post('/forget','Home\Login\LoginController@vcforget');

//协议路由
Route::get('/agreement','Home\Login\LoginController@agreement');

//用户退出
Route::get('/logout','Home\Login\LoginController@logout');

//验证码路由
Route::get('/code/captcha/{tmp}', 'Home\Login\LoginController@captcha');

//发送邮件路由
Route::post('/mail','Mail\Mail\MailController@mail');


Route::resource('/admin/user', 'Admin/UserController@index');

//后台登录页面路由
Route::get('admin/login','Admin\LoginController@login');

//登录页面的验证码
Route::get('admin/yzm','Admin\LoginController@yzm');

//登录页面的处理逻辑
Route::post('admin/dologin','Admin\LoginController@dologin');

//加密演示
Route::get('crypt','Admin\LoginController@crypt');

//后台
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'islogin'],function(){

//后台首页
    Route::get('index','LoginController@index');

//退出登录
    Route::get('logout','LoginController@logout');
 
//用户模块
    Route::resource('user','UserController');
    Route::get('user','UserController@index');

    Route::post('user/show','UserController@show');

    Route::post('user/insert','UserController@insert');

});
// 管理员详情
Route::get('/admin/usershow/glyuser/{name}','Admin\UsershowController@glyuser');
// 详情页面
Route::post('/admin/usershow/update','Admin\UsershowController@update');

//订单路由
Route::get('home/order', 'Home\Order\OrderController@order');

//发送邮件路由
Route::post('/mail','Mail\Mail\MailController@mail');


// 店家后台
// 申请店铺
Route::get('/shop/register','Shop\ShopController@register');
// 写入数据
Route::post('/shop/doreg','Shop\ShopController@doreg');

//个人中心页面
Route::get('/home/personal','Home\Personal\PersonalController@personal');
Route::post('/home/personal/upload', 'Home\Personal\PersonalController@upload');

//前台修改密码
Route::get('/home/personal/pwdindex', 'Home\Personal\PersonalController@pwdindex');
Route::post('/home/personal/pwd', 'Home\Personal\PersonalController@pwd');