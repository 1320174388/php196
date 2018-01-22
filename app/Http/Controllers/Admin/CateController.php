<?php

namespace App\Http\Controllers\Admin;

use App\Model\Cate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CateController extends Controller
{
    //修改分类排序
    public function changeOrder(Request $request)
    {
//       排序的业务逻辑

        $input = $request->except('_token');

        // 找到要修改排序的那条记录
        $cate = Cate::find($input['cate_id']);

//        修改这条记录的排序值为传过来的排序值
        $res = $cate->update(['cate_order'=>$input['cate_order']]);

        //判断是否修改成功
        if($res){
            $data = [
              'status'=>0,
                'msg'=>"排序修改成功"
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>"排序修改失败"
            ];
        }
        return $data;
    }
    /**
     * 显示分类列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $cates = Cate::all();

//        实例化分类对象
        $cate = new Cate();
        $cates = $cate->getCate();

        return view('admin.cate.list',compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        获取一级类
        $cateone = Cate::where('cate_pid',0)->get();
        //返回一个分类添加页面
        return view('admin.cate.add',compact('cateone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1 获取请求参数数据
        $input = $request->except('_token');
//        dd($input);
        //添加操作


        $res = Cate::create($input);
        if($res){
            return redirect('admin/cate')->with('msg','添加成功');
        }else{
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
