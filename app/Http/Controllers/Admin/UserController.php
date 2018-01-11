<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /*
     * 返回用户添加页面
     */
    public function add()
    {
        return view('user.add');
    }

    /*
     * 将用户提交的添加用户数据保存到数据库的user表中，添加用户
     */

    public function store(Request $request)
    {

       return  $request->path();
       return  $request->method();
//        1. 获取表单提交的数据
        $input = $request->except('_token');
//        dd($input);

//        2. 执行添加操作
        // 插入

        $res = DB::table('user')->insert(
            ['user_name' => $input['user_name'], 'user_pass' => $input['user_pass']]
        );



//        3. 进行添加是否成功的判断，如果成功，跳转到列表页，如果失败，返回添加页

        if($res){
//            return view('user.index')->with('msg','添加成功');
             return redirect('user/index')->with('msg','添加成功');
        }else{
            return back()->with('msg','添加失败');
        }
    }


    /*
     * 返回列表页
     */
    public function index()
    {
        //1 获取所有的列表用户数据

//        查询user表
        $users = DB::table('user')->get();
//        2. 将数据绑定到列表页上

        return view('user.list',['users'=>$users]);
    }
    
    /*
     * 返回用户修改页面
     */

    public function edit($id)
    {
        //根据id找到要修改的用户
        $user = DB::table('user')->where('id',$id)->first();
        return view('user.edit',['user'=>$user]);
        
    }

    /*
     * 提交用户的修改操作
     */

    public function update(Request $request)
    {
//        1. 接收用户提交的修改数据 和要修改的用户的id
            $input = $request->except('_token');


//        2. 修改指定用户的数据
        $res = DB::table('user')
            ->where('id', $input['id'])
            ->update(['user_name' => $input['user_name']]);


        if($res){
//            return view('user.index')->with('msg','添加成功');
            return redirect('user/index')->with('msg','修改成功');
        }else{
            return back()->with('msg','修改失败');
        }
    }
    
    //删除用户
    public function delete($id)
    {
        //根据ID找到要删除的用户记录
        $res = DB::table('user')->where('id',$id)->delete();

        if($res){
            return '删除成功';
        }else{
            return '删除失败';
        }
    }

}
