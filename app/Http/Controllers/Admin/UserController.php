<?php
 
namespace App\Http\Controllers\Admin;

use App\Models\data_admin_addr;
use App\Models\data_user;
use App\Models\Data_Role;
use Illuminate\Http\Request;
use DB;
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
//        dd($res1);
        if($res1){
            return redirect('/admin/user')->with(['info' => '添加成功']);
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

    public function update(Request $request)
    {
        $id = $request['id'];

        $user = data_user::where('id',$id)->first();


        if($user->status == 0 ){
            $user->status = 1;
            $user->save();
            return 0;
        }elseif($user->status == 1){
            $user->status = 0;
            $user->save();
            return 1;
        }

    }

    public function updategl(Request $request)
    {
        $id = $request['id'];

        $user = data_admin_addr::where('id',$id)->first();


        if($user->status == 2 ){
            $user->status = 3;
            $user->save();
            return 2;
        }elseif($user->status == 3){
            $user->status = 2;
            $user->save();
            return 3;
        }

    }

    public function destroy($id)
    {
        $res = \DB::table('data_role')->delete($id);

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

    public function store(Request $request)
    {

    }

    public function auth($id)
    {
//        根据id找到相关的用户U
        $user = data_admin_addr::find($id);
//        dd($user);
//        获取角色列表
        $roles = Data_Role::get();

        //获取当前用户已经拥有的角色列表

        $own_roles = $user->roles;
//        dd($own_roles);
        //存放当前用户拥有的角色的id
        $own = [];
        foreach ($own_roles as $v){
            $own[] = $v->id;
        }

        return view('admin.user.auth',compact('user','roles','own'));
    }

    //处理用户授权操作

    public function doAuth(Request $request)
    {
//        1. 获取传过来的参数（要授权的用户的ID，要授予的角色的ID）
        $input = $request->except('_token');
//         dd($input);


//        2. 提交到user_role这个关联表中



        //开启事务
        DB::beginTransaction();

        try{
            //删除当前用户的所有权限
            DB::table('index_user_role')->where('user_id', $input['id'])->delete();


            if(!empty($input['role_id'])){
                //关联表中记录（给用户授权）前，应该检查一下，当前用户是否已经拥有了此角色，如果没有再添加
                foreach ($input['role_id'] as $v){

                    DB::table('index_user_role')->insert(
                        ['user_id' => $input['id'], 'role_id' => $v]);
                }
            }
            DB::commit();
            return redirect('admin/user')->with(['info' => '添加成功']);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage(),'info' => '授权失败']);
        }
    }

}
