<?php

namespace App\Http\Controllers\Home\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_user;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

use Gregwar\Captcha\CaptchaBuilder; 
use Gregwar\Captcha\PhraseBuilder;

class LoginController extends Controller
{

	 // 生成一个验证码
	 // 作者 王洋鹏
	public function captcha($tmp)
	{
	    $phrase = new PhraseBuilder;
	    // 设置验证码位数
	    $code = $phrase->build(4);
	    // 生成验证码图片的Builder对象，配置相应属性
	    $builder = new CaptchaBuilder($code, $phrase);
	    // 设置背景颜色
	    $builder->setBackgroundColor(220, 210, 230);
	    $builder->setMaxAngle(25);
	    $builder->setMaxBehindLines(0);
	    $builder->setMaxFrontLines(0);
	    // 可以设置图片宽高及字体
	    $builder->build($width = 100, $height = 40, $font = null);
	    // 获取验证码的内容
	    $phrase = $builder->getPhrase();
	    // 把内容存入session
	    \Session::put('code', $phrase);
	    // 生成图片
	    header("Cache-Control: no-cache, must-revalidate");
	    header("Content-Type:image/jpeg");
	    $builder->output();
	}

    // 显示一个登录的主页   
    
    public function login()
    {
      $title = '登录';
    	return view('home.login.login',['title' => $title]);
    }


	//登录验证
	public function Verification(Request $request)
	{
		
		//验证输入是否符合规则
		$this->validate($request, [
            'name' => 'required|between:6,18',
            'password' => 'required|between:6,18|alpha_dash',
        ],[
          	'name.required' => '请输入账号',
          	'name.between' => '账号的长度必须在6-18位',
          	'password.required'=> '请输入密码',
          	'password.between' => '密码的长度必须在6-18位',
          	'password.alpha_dash' => '密码必须是字母数字下划线',
        ]);

		    //获取传输的值
        $data = $request->except('_token');

        //判断验证码是否正确
        if($data['code'] != session('code')){
        	return back()->with('errors','验证码错误')->withInput();
        }

        //判断是否是用户名邮箱还是手机号登录
        $name='';
       
        $b = preg_match('/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/',$data['name']);
        $c = preg_match('/^1[0-9]{10}$/',$data['name']);

        if($b){
          $name = 'email';
        }elseif($c){
          $name = 'phone';
        }else{
          $name='name';
        }

        //查询
        $user = data_user::where($name,$data['name'])->first();

        if($user->status == 0){
       		return back()->with('errors','您的用户已经被禁用')->withInput();
       	}

       		//如果没有此用户,返回用户名错误
       	if(!$user){
       		return back()->with('errors','用户名或密码错误')->withInput();
       	}
        
       	if(Crypt::decrypt($user->password) != $data['password']){
       		return back()->with('errors','用户名或密码错误');
       	}



       	// 如果有效就登录到后台，验证失败就返回到添加页面
		// 将用户的登录状态保存到session
       	\Session::put('home_user',$user);

        return redirect('/');
	}

	//退出登录
	public function logout()
	{
		\Session::forget('home_user');
    \Session::forget('home_user_rest');
    \Session::forget('home_user_detail');
		return redirect('/login')->with('errors','退出成功');
	}




  //显示一个注册页面
	public function register()
	{
    $title = '注册';
		return view('home.login.register',['title' => $title]);
	}

  //注册验证
	public function Prove(Request $request)
	{
		
		
		//验证传输过来的内容是否符合规则
		
		$this->validate($request, [
            'name' => ['required','between:6,18','regex:/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,18}$/'],
            'email' => 'required|email',
            'password' => 'required|between:6,18|alpha_dash',
            'repwd' => 'required|same:password',
        ],[
        	'name.required' => '请输入账号',
        	'name.between' => '账号的长度必须在6-18位',
          'name.regex' => '账号必须有字母和数字',
        	'password.required'=> '请输入密码',
        	'password.between' => '密码的长度必须在6-18位',
        	'password.alpha_dash' => '密码必须是字母数字下划线',
        	'email.required' => '请填写合法邮箱',
        	'email.email' => '请输入合法邮箱',
        	'repwd.required' => '请输入确认密码',
        	'repwd.same' => '确认密码与密码不一致',
        ]);


       //让验证码都变成小写
      strtolower($request['code']);
      strtolower(session('code'));

		  //判断验证码是否正确
  		if($request['code'] != session('code')){
          return back()->with('errors','验证码错误')->withInput();
      }

		  //获取要用的内容
       $data = $request->except('_token','code','repwd');

        //加密密码
      $data['password'] = Crypt::encrypt($data['password']);
      $data['status'] = 1;
      $data['avatar'] = 'default.jpg';
      

        //实例化一个model表
      $data_user = new data_user;

        //添加数据
      foreach($data as $k=>$v){
        $data_user->$k = $v;
      }
        //发送添加
      $res = $data_user -> save();

        //判断是否添加成功
      if($res){
       	return redirect('/login')->with('errors','注册成功,请登录');
      }else{
       	return back()->with('errors','注册失败')->withInput();
      }
      
	}


  //忘记密码
  public function forget()
  {
    $title = '忘记密码';
    return view('home.login.forget',['title' => $title]);
  }

  //忘记密码验证
  public function vcforget(Request $request){

    //验证传输过来的是否符合规则
      $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|between:6,18|alpha_dash',
            'repwd' => 'required|same:password',
        ],[
          'password.required'=> '请输入密码',
          'password.between' => '密码的长度必须在6-18位',
          'password.alpha_dash' => '密码必须是字母数字下划线',
          'email.required' => '请填写合法邮箱',
          'email.email' => '请输入合法邮箱',
          'repwd.required' => '请输入确认密码',
          'repwd.same' => '确认密码与密码不一致',
        ]);

       //让验证码都变成小写
      strtolower($request['code']);
      strtolower(session('code'));

      //判断验证码是否正确
      if($request['code'] != session('code')){

            return back()->with('errors','验证码错误')->withInput();
      }

      // 判断邮件中的验证码是否一致
      if($request['yzm'] != \Cookie::get('yzm')){
            return back()->with('errors','邮箱验证失败')->withInput();
      }

      //接受传输过来的数据
      $data = $request->except('_token','code','yzm','repwd');

      //查询是否有该数据
      $data_user = data_user::where('email',$data['email'])->first();

     

      //原来的密码和现在输入的密码相同
      if( $data['password'] == Crypt::decrypt($data_user->password) ){
        return redirect('/login')->with('errors','修改密码成功,请登录');
      }

      //加密密码
      $data_user->password = Crypt::encrypt($data['password']);



      //发送执行
      $res = $data_user->save(); 

      //判断修改成功还是失败。
      if($res){
          return redirect('/login')->with('errors','修改密码成功,请登录');
      }else{
          return back()->with('errors','修改密码失败')->withInput();
      }

  }


    //协议的路由
    //展示一个协议页面
    public function agreement()
    {
      return view('home.login.agreement');
    }


    //ajax
    //验证账号密码是否存在
    public function zcajax(Request $request){

      $name = $request['name'];
      $val = $request['val'];

      $user = data_user::where($name,$val)->first();

      if(isset($user) && $user->name == $val){
        return json_encode(1);
      }elseif(isset($user) && $user->email == $val){
        return json_encode(2);
      }else{
        return json_encode(NULL);
      }

    }


}
