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

//      //      多条件
        $data = data_admin_addr::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $username = $request->input('username');
                $email = $request->input('email');
                $phone = $request->input('phone');
                //如果用户名不为空
                if(!empty($username)) {
                    $query->where('name','like','%'.$username.'%');
                }
                // 如果手机号不为空
                if(!empty($phone)) {
                    $query->where('phone','like','%'.$phone.'%');
                }
                //如果邮箱不为空
                if(!empty($email)) {
                    $query->where('email','like','%'.$email.'%');
                }
            })->paginate(5);
        return view('admin.user.ptyhlist',['data'=>$data, 'request'=> $request]);
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
    public function store(Request $request)
    {
//        1. 接收表单提交过来的参数
        $input = $request->all();

//      2. 验证数据的有效性

        $rule = [
            'name'=>'required|between:5,18',
            'password'=>'required|between:5,18|alpha_dash',
        ];

        //提示信息
        $mess = [
            'name.required'=>'用户名不能为空',
            'name.between'=>'用户名的长度必须在5-18位',
            'password.required'=>'密码不能为空',
            'password.between'=>'密码的长度必须在5-18位',
            // 'password.alpha_dash'=>'密码必须是数字字母下划线',
        ];
        $this->Validate($request, $rule,$mess);
     
//        向数据表中添加数据的第二种方法

        $input['password'] = Crypt::encrypt($input['password']);

        $stu = new data_admin_addr; // 实例化一个类
        $stu->name = $input['name'];
        $stu->password = $input['password'];
        $stu->status = 2;
        $res = $stu->save();   // 执行添加数据操作

        // dd($request->all());
//         4. 判断是否添加成功
        if($res){
            //如果添加成功，跳转到列表页
            return redirect('admin/index')->with('msg','添加成功');
        }else{
            //如果添加失败，返回到添加页
            return back()->with('msg','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // return view('admin.user.ptyhlist');
    }

    public function destroy($id)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //1 通过传过来的id获取到要修改的用户记录
        $user = data_admin_addr::find($id);

        return view('admin.user.edit',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->only('user_name');
//        dd($input);

//        使用模型修改表记录的两种方法,方法一
        $user = data_admin_addr::find($id);
//        $user->user_name = $input['user_name'];
//        $res = $user->save();


//        方法二
        $res = $user->update($input);

        if($res){


            return redirect('admin/user');
        }else{
            //如果添加失败，返回到修改页
            return back()->with('msg','修改失败');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
