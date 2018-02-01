<?php

namespace App\Http\Controllers\Home\Personal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_user_detail;
use App\Models\data_user;
use Illuminate\Support\Facades\Validator;
use App\Models\data_user_addr;
use App\Models\data_order_detail;
use App\Models\data_order;
use App\Models\index_coll;
use Illuminate\Support\Facades\Redis;


class PersonalController extends Controller
{

    //显示个人中心页面
    public function personal(Request $request)
    {

        $user_id = session('home_user')->id;

        $order = data_order::where('user_id', $user_id)->get();
        // dd($user_id);
        // $oarr = [];
        // foreach($user_id as $k=>$v)
        // {
        //     $oarr->$k = $v;
        // }
        // dd($oarr);
        // $onum = data_order::get()->data_order_detail();
        // dd($onum);

        $arr = [];
        foreach($order as $k=>$v){
           $arr[$k]= json_decode($v,true);
        }
        
        // dd($arr);
    	return view('Home.personal.member_index', compact('order'));
        // , compact('user')
    }

    public function upload(Request $request)
    {   
        
        dd($data);
    	//是否有图片
    	if($request->hasFile('himg')){
    		//获取上传图片
    		$file = $request->file('himg');
    		//判断上传文件的有效性
    		if($file->isValid())
            {
                $ext = $file->getClientOriginalExtension();
                $filename = time().mt_rand(10000,99999).'.'.$ext;

                $res = $file->move('/home/avatar',$filename);
                $filepath = '/home/avatar/'.$res;

                return $filepath;
            }
            
        }

        // $file = new data_user;
        // $file->avatar = ;
        


    }

    public function crypt()
    {
        $str = 123123123;

        return encrypt($str);
    }

    public function pwdindex()
    {
        return view('home.personal.member_pwd');
    }

    public function pwd(Request $request)
    {
        $pwd = $request->except('_token');

        $old_pwd = $pwd['old_password'];

        $new_pwd = $pwd['new_password'];

        $ymm = decrypt(session('home_user')->password);

        if($old_pwd != $ymm)
        {
            return back()->with('errors', '您输入的原密码不正确！');
        }else
        {
        
            $rule = [
                'old_password' => 'required|between:6,18|dash',
                'new_password' => 'required|between:6,18|dash',
                'news_password' => 'required|between:6,18|dash',
            ];

            $mess = [
                'old_password.required' => '旧密码不能为空',
                'old_password.between' => '旧密码必须是6 - 18位',
                'old_password.dash' => '旧密码必须是字母数字下划线', 
                'new_password.required' => '新密码不能为空',
                'new_password.between' => '新密码必须是6 - 18位',
                'new_password.dash' => '新密码必须是字母数字下划线',
            ];

            $validator = Validator::make($pwd, $rule, $mess);

            if($pwd['new_password'] != $pwd['news_password'])
            {
                return back()->with('errors', '两次密码不一致');
            }else
            {   
                $idh = session('home_user')->id;

                $update = data_user::where('id', $idh)->update(['password' => encrypt($new_pwd)]);
                $data_user = data_user::find($idh); // 获取当前修改这一条数据
                Redis::hmset('home_user',[$idh=>$data_user]); // 同步Redis中

                if($update)
                {
                    return back()->with('errors', '修改成功！');
                }else
                {
                    return back()->with('errors', '修改失败！');
                }
            }
        }
    }

    public function addrindex()
    { 
        $did = session('home_user')->id;

        $user_addr = data_user_addr::where('user_id', $did)->get();

        return view('home.personal.member_addrindex', compact('user_addr'));
    }

    public function addradd(Request $request)
    {
        $this->validate($request,[
            'address'=>'required',
            'addr_phone'=>'required|numeric|digits_between:10,11',
        ],[
            'address.required'=>'请填写详细地址',
            'addr_phone.required'=>'请填写正确手机号',
            'addr_phone.digits_between'=>'请填写正确手机号',
            'addr_phone.numeric'=>'请填写正确手机号',
        ]);
        $newaddr = $request->except('_token');
        // dd($newaddr);
        $addr = new data_user_addr;
        // dd($newaddr['address']);

        $addr->address = $newaddr['address'];

        $addr->addr_phone = $newaddr['addr_phone'];

        $addr->user_id = $newaddr['user_id'];

        $address = $addr->save();

        if($address){

            return redirect('/home/personal/addrindex')->with('errors', '添加成功');
        }else
        {
            return back()->with('errors', '添加失败请重新添加');
        }
    }

    public function delete($id)
    {

            $res = data_user_addr::find($id)->delete();

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

    public function shoucang(Request $request)
    {

        // echo json_encode(['msg'=>'成功']);
        
        $sc = new index_coll;

        $rest_id = $request->input('id');
        
        $user_id = session('home_user')->id;

        $row = index_coll::where('user_id', $user_id)->where('rest_id', $rest_id);
        $rows = $row->first();

        if($rows)
        {
            $row->delete();
            $res = 0;
        }else
        {
            $sc->rest_id = $rest_id;
            $sc->user_id = $user_id;
            $res = $sc->save();
        }

        if($res)
        {
            return 1;

        }else
        {
            return 2;
        }
    }

    public function scindex()
    {   
        
        $user_id = session('home_user')->id;

        $rests = \DB::table('index_colls')->select('index_colls.rest_id', 'data_rests.*')
                                          ->leftJoin('data_rests', 'data_rests.user_id', '=', 'index_colls.rest_id')
                                          ->where('index_colls.user_id', $user_id)
                                          ->get();

        // dd($rest_id);
        return view('home.personal.member_collect', compact('rests'));
    }

    public function removesc(Request $request)
    {
        $rest_id = $request->input('rest_id');
        $user_id = $request->input('user_id');
        // return $rest_id;
        $res = \DB::table('index_colls')->where('rest_id', $rest_id)->where('user_id', $user_id)->delete();

        if($res)
        {
            return 1;
        }else
        {
            return 2;
        }

    }

    public function colls()
    {
        return ;
    }
}