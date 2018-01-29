<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Org\code\Code;
require_once app_path().'/Org/code/Code.class.php';

use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Facades\Input;
use App\Models\data_admin_addr;
use Session;

class LoginController extends Controller
{
    /*
     * 返回登录页面
     * @author xxx
     * @datetime 20180111 
     * @param null
     * @return 返回一个后台的登录页面视图
     */
    public function login()
    {
        return view('admin.login.login');
    }

    /*
    * 返回验证码
    * @author xxx
    * @datetime 20180111 15:03
    * @param null
    * @return 返回一个后台的登录页面视图
    */
    public function yzm()
    {
        $code = new Code();
        return $code->make();
    }

    //处理登录逻辑的
    public function dologin(Request $request)
    {

//      1. 获取用户提交过来的登录数据
        $input = $request->all();
        // dd($input);

//      2. 验证数据的有效性
//      Validator::make('要验证的数据','验证规则','提示信息')
        $rule = [
            'username'=>'required|between:5,18',
            'password'=>'required|between:5,18|alpha_dash',
        ];

        //提示信息
        $mess = [
            'username.required'=>'用户名不能为空',
            'username.between'=>'用户名的长度必须在5-18位',
            'password.required'=>'密码不能为空',
            'password.between'=>'密码的长度必须在5-18位',
            'password.alpha_dash'=>'密码必须是数字字母下划线',
        ];

        $validator = Validator::make($input, $rule,$mess);
        //dd($validator);
        // 如果验证失败
        if ($validator->fails()) {
            return redirect('admin/login')
                ->withErrors($validator)
                ->withInput();
        }

        //          验证码
        if(strtolower($input['code']) != strtolower(session('code'))){
            return back()->with('errors','验证码错误');
        }
        // dd($input['code']);

//      3. 判断用户名、密码、验证码的有效性
//      $input['username']
        $user = data_admin_addr::where('name',$input['username'])->first();
        //如果没有此用户，返回没有此用户的错误提示
        // dd($user);
        $sta = $user->status;
//        dd($sta);
        if($sta == 3){
            return back()->with('errors','抱歉，你的账号已被停用');
        }
        if (! $user) {
          return back()->with('errors','无此用户');
        }

//      密码不正确
        if(Crypt::decrypt($user->password) != $input['password']){
          return back()->with('errors','密码错误');
        }

// dd(11);



//  4. 如果有效就登录到后台，验证失败就返回到添加页面
//  将用户的登录状态保存到session

        Session::put('admin_user',$user);

        return redirect('admin/usershow/show');

    }

    public function index()
    {
        return view('admin.user.index');
    }

    // 退出登录
    public function logout()
    {
        session()->forget('admin_user');
        return redirect('admin/login');
    }

     /*public function crypt()
    {

       //  $str = '123123';
       // return Crypt::encrypt($str);
       $str = 'eyJpdiI6IlM3SFhHQWZYNlJ6d252NzJKdytYc2c9PSIsInZhbHVlIjoiMk9aZ1BRRVdURDB1NVJBYzh2dVc5QT09IiwibWFjIjoiYjYwNzFhYmNiNjcxOTY1MGMzNTNmNjg2NzEwMzFlYjVkMDRkMDdiNTU3Mjg4MzBjZmIzMDc0NmEwODdjMjIwNSJ9';
       return crypt::decrypt($str);


    }*/
    
}
