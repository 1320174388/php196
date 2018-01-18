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

//        1. 获取所有的数据，显示到列表中
       // $data = User::get();
//        向模板绑定变量的三种方法
//        方法一：[]
       return view('admin.user.glylist');
//        方法二：with
//        return view('admin.user.list')->with('data',$data);
//        方法三： compact()
//        return view('admin.user.list',compact('data'));


//        2. 获取分页数据
//
//        $data = User::orderBy('user_id','asc')->paginate(2);
//        return view('admin.user.list',compact('data'));


//        3. 单条件搜索
//        获取用户提交过来的搜索条件
//          $input = $request->only('keywords');
//          dd($input);

//        $data = User::where('user_name','like','%'.$input['keywords'].'%')->paginate(2);
//        return view('admin.user.list',compact('data','input'));



//        4 多条件
        $data = User::orderBy('user_id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $username = $request->input('keywords1');
                $email = $request->input('keywords2');
                //如果用户名不为空
                if(!empty($username)) {
                    $query->where('user_name','like','%'.$username.'%');
                }
                //如果邮箱不为空
                if(!empty($email)) {
                    $query->where('user_email','like','%'.$email.'%');
                }
            })
            ->paginate($request->input('num', 5));
        return view('admin.user.list',['data'=>$data, 'request'=> $request]);

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
    public function show($id)
    {
        //
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
        $user = User::find($id);

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
        $user = User::find($id);
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
    public function destroy($id)
    {
        $res = User::find($id)->delete();
        //如果删除成功
        if($res){
            $data = [
                'status'=>0,
                'message'=>'删除成功'
            ];
        }else{
            $data = [
                'status'=>1,
                'message'=>'删除失败'
            ];
        }

//        return response()->json($data);
//        json_encode($data);

        return $data;
    }
}
