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
    Route::post('usershow/show','UsershowController@show');

    // 个人详情（管理员）
    Route::get('usershow/glyuser/{name}','UsershowController@glyuser');
    // 修改个人详情页面（管理员）
    Route::post('usershow/update','UsershowController@update');
    // 添加用户授权逻辑
    Route::post('role/doauth','RoleController@doAuth');
    // 添加管理员授权逻辑
    Route::post('user/doauth','UserController@doAuth');

    // 店铺详情
    Route::post('list','ShopController@list');
    // 审核通过
    Route::post('details','ShopController@details');
    // 审核不通过
    Route::post('del','ShopController@del');


    // 删除角色
    Route::resource('usershow','UsershowController');
    // 修改角色
    Route::post('role/update','RoleController@update');

    // 添加管理员
    Route::post('user/insert','UserController@insert');
    // 管理员管理
    Route::post('user/update','UserController@update');

    // 管理员授权
    Route::post('user/updategl','UserController@updategl');

    // 修改角色（权限）
    Route::get('role/{id}/edit','RoleController@edit');

    // 用户模块
    // 管理员授权页面
    Route::get('user/auth/{id}','UserController@auth');

    //角色相关的路由
    // 角色授权页面
    Route::get('role/auth/{id}','RoleController@auth');

    // 权限不够
    Route::get('auth','RoleController@hasRole');

});

//后台
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['islogin','hasRole']],function(){

    //后台首页（管理员列表）
    Route::resource('user','UserController');

    //角色列表
    Route::resource('role','RoleController');

    //店铺路由
    //店铺列表
	Route::get('shop','ShopController@index');

});


//发送邮件路由
Route::post('/mail','Mail\Mail\MailController@mail');

// 申请店铺
Route::get('/shop/register','Shop\ShopController@register')->middleware('homeislogin');
Route::post('/shop/doreg','Shop\ShopController@doreg')->middleware('homeislogin');

// 店家后台
Route::group(['prefix'=>'shop','namespace'=>'Shop','middleware'=>['shopislogin','isshop']],function(){

    // 店铺管理
    Route::get('admin','AdminController@index');
    // 账号管理
    Route::get('admin/user','AdminController@userInfo');
    // 实名认证
    Route::get('admin/ident','AdminController@identify');
    // 分类管理
    Route::get('admin/addInfo','AdminController@addInfo');
    // 执行添加
    Route::post('admin/doaddInfo','AdminController@doaddInfo');
    // 食品管理
    Route::get('admin/webSet','AdminController@webSet');
    // 添加食品
    Route::post('admin/dowebSet','AdminController@dowebSet');
    // 编辑食品
    Route::post('admin/webEdit/{id}','AdminController@webEdit');
    // 删除食品
    Route::get('admin/webDel/{id}','AdminController@webDel');
    // 提交订单
    Route::get('admin/order_index','OrderController@index');
    // 订单详情
    Route::post('admin/order_detail','OrderController@detail');
    // 处理订单提交
    Route::post('admin/order_edit','OrderController@edit');
    // 处理中订单
    Route::get('admin/order_handle','OrderController@handle');
    // 完成订单
    Route::get('admin/order_show','OrderController@show');

});

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

//店铺评论
Route::get('/home/shop/comment/{id}','Home\Shop\ShopController@comment');
Route::post('/home/shop/comment/ajax','Home\Shop\ShopController@ajax');

//购物车，订单
Route::group(['prefix'=>'home/shop', 'namespace' => 'Home\Shop'],function(){
        Route::get('index/{id}', 'ShopController@index');
        Route::get('buy/{id}', 'ShopController@buy');
        Route::post('details', 'ShopController@details');
        Route::post('addfood', 'ShopController@addfood');
        Route::post('delfood', 'ShopController@delfood');
        Route::get('settle', 'ShopController@settle');
        Route::post('orderss', 'ShopController@orderss');
});

Route::group(['prefix' => 'home/order', 'namespace' => 'Home\Order'], function(){
    Route::get('neworder', 'OrderController@neworder');
    Route::get('overorder', 'OrderController@overorder');
    Route::post('detail', 'OrderController@detail');
    Route::get('handle', 'OrderController@handle');
    Route::post('edit', 'OrderController@edit');
});

Route::post('/shoucang', 'home\personal\PersonalController@shoucang');

