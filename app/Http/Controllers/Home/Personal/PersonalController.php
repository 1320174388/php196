<?php

namespace App\Http\Controllers\Home\Personal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_user_detail;
use App\Models\data_user;
use Illuminate\Support\Facades\Validator;

class PersonalController extends Controller
{
    
    //显示个人中心页面
    public function personal()
    {

        $user = data_user::find(1);
        // dd($user['name']);
    	return view('Home.personal.member_index', compact('user'));
    }

    public function upload(Request $request)
    {
    
    	//是否有图片
    	if($request->hasFile('himg')){
    		//获取上传图片
    		$file = $request->file('himg');
    		//判断上传文件的有效性
    		if($file->isValid())
            {	
            	//获取侯垂明
                $ext = $file->getClientOriginalExtension();
                $filename = time().mt_rand(10000,99999).'.'.$ext;

                $res = $file->move('/home',$filename);
                $filepath = 'home/'.$res;

                return $filepath;

            }
        }
    }

    public function pwdindex()
    {
        return view('home.personal.member_pwd');
    }

    public function pwd(Request $request)
    {  
        $pwd = $request->except('_token');

        // $this->validate($request, [
        //     'old_password' => 'required|between:6,18|dash',
        //     'new_password' => 'required|between:6,18|dash',
        //     'news_password' => 'required|between:6,18|dash',
        // ], [
        //     'old_password.required' => '旧密码不能为空',
        //     'old_password.between' => '旧密码必须是6 - 18位',
        //     'old_password.dash' => '旧密码必须是字母数字下划线', 
        //     'new_password.required' => '新密码不能为空',
        //     'new_password.between' => '新密码必须是6 - 18位',
        //     'new_password.dash' => '新密码必须是字母数字下划线',

        // ]);

        $rule = [
            'old_password' => 'required|between:6,18|dash',
            'new_password' => 'required|between:6,18|dash',
            'news_password' => 'required|between:6,18|dash',
        ];

        $mess = [
            'old_password.required' => '旧密码不能为空',
            'old_password.between' => '旧密码必须是6 - 18位',
            'old_password.dash' => '旧密码必须是字母数字下划线', 
            'new_password.required' => '新密码不能为空',
            'new_password.between' => '新密码必须是6 - 18位',
            'new_password.dash' => '新密码必须是字母数字下划线',
        ];

        $validator = Validator::make($pwd, $rule, $mess);

        dd($validator);

        $pwd = $pwd->old_password;
        $pwds = $pwd->new_password;

        dd($pwd, $pwds);

    }
}
