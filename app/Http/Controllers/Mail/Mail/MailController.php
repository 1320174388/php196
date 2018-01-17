<?php

namespace App\Http\Controllers\Mail\Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Models\data_user;

class MailController extends Controller
{
    // 发送邮件
    public function mail(Request $request)
    {

        //获取传输过来的邮箱
    	$email = $request['email'];

        //查询有无该邮箱
        $user = data_user::where('email',$email)->first();
        
        //如果有该邮箱则发送邮件
        if($user){

            //生成一个随机的验证码
            $code = rand(1000,9999);

            //把随机的验证码存入session
            \Cookie::queue('yzm', $code, 3);

            //发送邮件
            $data = ['email'=>$email,'code'=> $code];

            Mail::send('home.mails.agreement', ['data' => $data], function($message) use($data){
                $message->to($data['email'])->subject('[飞车快餐]找回您的账户密码');
            });
        }

    }
}
