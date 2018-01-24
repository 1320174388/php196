<?php

namespace App\Http\Controllers\Admin;

use App\Models\Data_Permission;
use App\Models\Data_Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class RoleController extends Controller
{
    public function auth($id)
    {
//        根据id找到相关的用户U
        $role = Data_Role::find($id);
//        dd($user);
//        获取角色列表
        $pers = Data_Permission::get();
//        dd($roles);

        //获取当前用户已经拥有的角色列表

        $own_roles = $role->permission;
//        dd($own_roles);
        //存放当前用户拥有的角色的id
        $own = [];
        foreach ($own_roles as $v){
            $own[] = $v->id;
        }

        return view('admin.role.auth',compact('role','pers','own'));
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
            DB::table('index_role_permission')->where('role_id', $input['role_id'])->delete();


            if(!empty($input['permission_id'])){
                //关联表中记录（给角色授权）前，应该检查一下，当前角色是否已经拥有了此权限，如果没有再添加
                foreach ($input['permission_id'] as $v){

                    DB::table('index_role_permission')->insert(
                        ['role_id' => $input['role_id'], 'permission_id' => $v]
                    );
                }
            }
            DB::commit();
            return redirect('admin/role')->with(['info' => '添加成功']);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage(),'info' => '授权失败']);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Data_Role::get();

        return view('admin.role.list',compact('role'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $res = Data_Role::create($input);

//        console.log($res);
//         4. 判断是否添加成功
        if($res){
            //如果添加成功，跳转到列表页
            return redirect('admin/role')->with('msg','添加成功');
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
        $user = Data_Role::find($id);

        return view('admin.role.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();
        $id = $request['id'];
//        dd($id);

        $user = Data_Role::find($id);

        $res = $user->update($input);

        if($res){
            return redirect('admin/role')->with('msg','修改成功');
        }else{
            //如果添加失败，返回到修改页
            return back()->with('msg','修改失败');

        }
    }

}
