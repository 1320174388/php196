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

//退出登录
Route::get('admin/logout','Admin\LoginController@logout');

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'islogin'],function(){
    // 普通用户列表
    Route::post('user/show','UserController@show');

    // 个人详情（管理员）
    Route::get('usershow/glyuser/{name}','UsershowController@glyuser');
    // 修改个人详情页面（管理员）
    Route::post('usershow/update','UsershowController@update');
    // 添加用户授权逻辑
    Route::post('role/doauth','RoleController@doAuth');
    // 添加管理员授权逻辑
    Route::post('user/doauth','UserController@doAuth');

    // 角色相关的路由
    // 角色授权页面
    Route::get('role/auth/{id}','RoleController@auth');
    // 修改角色（权限）
    Route::get('role/{id}/edit','RoleController@edit');
    // 删除角色
    Route::post('user/{id}','UsershowController@destroy');
    // 修改角色
    // Route::post('role/{id}','RoleController@update');

    // 用户模块
    // 管理员授权页面
    Route::get('user/auth/{id}','UserController@auth');
    // 管理员授权
    Route::post('user/updategl','UserController@updategl');

    // 店铺详情
    Route::post('list','ShopController@list');
    // 店铺授权
    Route::post('details','ShopController@details');

});

//后台
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['islogin','hasRole']],function(){

    //后台首页（管理员列表）
    Route::resource('user','UserController');

    // 添加管理员
    Route::post('user/insert','UserController@insert');

    // 角色控制资源控制器
    Route::resource('role','RoleController');

    // 管理员管理
    Route::post('user/update','UserController@update');

    //店铺路由
    //店铺列表
	Route::get('shop','ShopController@index');

});


//订单路由
Route::get('home/order', 'Home\Order\OrderController@order');

//发送邮件路由
Route::post('/mail','Mail\Mail\MailController@mail');


// 店家后台
// 申请店铺
Route::get('/shop/register','Shop\ShopController@register')->middleware('homeislogin');
Route::post('/shop/doreg','Shop\ShopController@doreg')->middleware('homeislogin');

// 店铺管理
Route::get('/shop/admin','Shop\AdminController@index')->middleware('homeislogin');
// 账号管理
Route::get('/shop/admin/user','Shop\AdminController@userInfo')->middleware('homeislogin');
// 实名认证
Route::get('/shop/admin/ident','Shop\AdminController@identify')->middleware('homeislogin');
// 分类管理
Route::get('/shop/admin/addInfo','Shop\AdminController@addInfo')->middleware('homeislogin');
// 执行添加
Route::post('/shop/admin/doaddInfo','Shop\AdminController@doaddInfo')->middleware('homeislogin');
// 食品管理
Route::get('/shop/admin/webSet','Shop\AdminController@webSet')->middleware('homeislogin');
// 添加食品
Route::post('/shop/admin/dowebSet','Shop\AdminController@dowebSet')->middleware('homeislogin');
// 编辑食品
Route::post('/shop/admin/webEdit/{id}','Shop\AdminController@webEdit')->middleware('homeislogin');
// 删除食品
Route::get('/shop/admin/webDel/{id}','Shop\AdminController@webDel')->middleware('homeislogin');


//个人中心页面
Route::get('/home/personal','Home\Personal\PersonalController@personal')->middleware('homeislogin');
Route::post('/home/personal/upload', 'Home\Personal\PersonalController@upload');

//前台修改密码
Route::get('/home/personal/pwdindex', 'Home\Personal\PersonalController@pwdindex')->middleware('homeislogin');
Route::post('/home/personal/pwd', 'Home\Personal\PersonalController@pwd');
//地址
Route::get('/home/personal/addrindex', 'Home\Personal\PersonalController@addrindex');
Route::post('/home/personal/addradd', 'Home\Personal\PersonalController@addradd');
Route::post('/home/personal/delete/{id}', 'Home\Personal\PersonalController@delete');
