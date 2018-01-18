<?php
 
namespace App\Http\Controllers\Admin;

use App\Models\data_admin_addr;
use Illuminate\Http\Request; 
 
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
//        单条件搜索
//        获取用户提交过来的搜索条件
        $name = $request->input('name','');
        $num = $request->input('num','10');
        $email = $request->input('email','');
        $phone = $request->input('phone','');

        $data = \DB::table('data_admin_addrs')->where('name','like','%'.$name.'%')
                                        ->where('email','like','%'.$email.'%')
                                        ->where('phone','like','%'.$phone.'%')
                                        ->paginate($num);
       return view('admin.user.glylist',[
            'data'=>$data,
            'where'=>[
                'name'=>$name,
                'email'=>$email,
                'phone'=>$phone,
                'num' =>$num
                ]
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    public function insert(Request $request){
        $this->validate($request,[
            'name' => 'required|min:6|max:18',
            'password' => 'required|min:6|max:18',
            're-password' => 'required|same:password',
            'phone' => 'required|size:11',
            'email' => 'required|email',
            'avatar' => 'required|image',
        ],[
            'name.required' =>'请输入手机号',
            'name.min' => '用户名太短,最少6位',
            'name.max' => '用户名过长,最大18位',
            'password.required' => '请输入密码',
            'password.min' => '密码不能少于6位',
            'password.max' => '密码不能大于18位',
            're-password.required' => '确认密码不能为空',
            're-password.same' => '两次输入密码不一致',
            'phone.required' => '请输入手机号',
            'phone.size' => '手机号输入错误',
            'email.required' => '请输入邮箱',
            'email.email' => '邮箱不合法',
            'avatar.required' => '请上传头像',
            'avatar.image' => '请上传正经头像',
        ]);

        $data = $request->except('_token','re-password'); // 获取所有字段

        $data['password'] = encrypt($data['password']); // 对密码进行加密

        if($request->hasFile('avatar')) // 处理文件上传
        { 
            $file = $request->file('avatar');
            if($file->isValid())
            {
                $ext = $file->getClientOriginalExtension();
                $filename = time().mt_rand(10000,99999).'.'.$ext;
                $res = $file->move('./uploads',$filename);
                if($res){
                    $data['avatar'] = $filename;
                }else{
                    $data['avatar'] = 'default.jpg';
                }
            }
        }

        $data['status'] = 2; // 处理状态字段

        $res1 = \DB::table('data_admin_addrs')->insert($data);
        if($res1){
            return redirect('/admin/user/index')->with(['info' => '添加成功']);
        }else{
            return back();
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request){ // 用户列表页
        $name = $request->input('name','');
        $num = $request->input('num','10');
        $email = $request->input('email','');
        $phone = $request->input('phone','');

        $data = \DB::table('data_users')->where('name','like','%'.$name.'%')
                                        ->where('email','like','%'.$email.'%')
                                        ->where('phone','like','%'.$phone.'%')
                                        ->paginate($num);
       return view('admin.user.ptyhlist',[
            'data'=>$data,
            'where'=>[
                'name'=>$name,
                'email'=>$email,
                'phone'=>$phone,
                'num' =>$num
                ]
            ]);
    }
    
}
