<?php

namespace App\Http\Controllers\Admin;

use App\Models\data_admin_addr;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class UsershowController extends Controller
{
    // 用户列表页
    public function show(Request $request){ 
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

    // 显示个人信息页面
    public function glyuser($name){

    	$data = \DB::table('data_admin_addrs')->where('name',$name)->first();
        return view('admin.user.glyshow',['data'=>$data]);
 	}
    // 修改管理员个人信息
    public function update(Request $request){
        $this->validate($request,[
            'name' => 'required|min:5|max:18',
            'password' => 'required|min:6|max:18',
            're-password' => 'required|same:password',
            'phone' => 'required|size:11',
            'email' => 'required|email',
            'avatar' => 'image',
        ],[
            'password.required' => '请输入密码',
            'password.min' => '密码不能少于6位',
            'password.max' => '密码不能大于18位',
            're-password.required' => '确认密码不能为空',
            're-password.same' => '两次输入密码不一致',
            'phone.size' => '手机号输入错误',
            'email.required' => '请输入邮箱',
            'email.email' => '邮箱不合法',
            'name.required' =>'请输入手机号',
            'name.min' => '用户名太短,最少5位',
            'name.max' => '用户名过长,最大18位',
            'phone.required' => '请输入手机号',
            'phone.size' => '手机号输入错误',
            'email.required' => '请输入邮箱',
            'email.email' => '邮箱不合法',
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
                if($res)
                {
                    $oldPic = \DB::table('data_admin_addrs')->where('id',$data['id'])->first()->avatar;
                    if($oldPic != 'default.jpg'){
                        unlink('./uploads/'.$oldPic);
                    }
                    $data['avatar'] = $filename;
                }
            }
        }
        $id = $data['id'];
        unset($data['id']);

        $row = \DB::table('data_admin_addrs')->where('id',$id)->update($data);

        if($row){
            $user = \DB::table('data_admin_addrs')->where('id',$id)->first();
            Session::put('admin_user',$user);
        }

        if($user){
            return redirect('/admin/user/index')->with(['info' => '更新成功']);
        }else{
            return back()-with(['info'=>'更新失败']);
        }
    }
    // 删除角色方法
    public function destroy($id)
    {
        $res = \DB::table('data_roles')->delete($id);

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
