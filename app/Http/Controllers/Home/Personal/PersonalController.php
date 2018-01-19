<?php

namespace App\Http\Controllers\Home\Personal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_user_detail;

class PersonalController extends Controller
{
    
    //显示个人中心页面
    public function personal()
    {

    	return view('Home.personal.member_index');
    }

    public function upload(Request $request)
    {
    	
    	//是否有图片
    	if($request->hasFile('himg')){
    		//获取上传图片
    		$file = $request->file('himg');
    		//判断上传文件的有效性
    		if($file->isValid())
            {	
            	//获取侯垂明
                $ext = $file->getClientOriginalExtension();
                $filename = time().mt_rand(10000,99999).'.'.$ext;

                $res = $file->move('/home',$filename);
                $filepath = 'home/'.$res;

                return $filepath;

            }
        }
    	}
    }



    //ajax
    // public function txajax(Request $request)
    // {



    // 	$file = $request->except('_token');
    // 	dd($file);


    	// $file = $request->input('img');

    	// dd($file);

    	//处理上传
      
        // if($request->hasFile('file'))
     //    if($request->hasFile("file")){ //判断是否有上传
	            
	    //         $myfile = $request->file("file");//获取上传信息
	            
	    //         dd($myfile);

	    //         if($myfile->isValid()){ // 确认上传的文件是否成功

	    //             $picname = $myfile->getClientOriginalName(); // 获取文件名

	    //             dd($picname);

	    // 			$ent = $myfile->getClientOriginalExtension();// 获取扩展名
	                
	    //             $filename = time().rand(1000,9999).".".$ent; // 拼接文件名
	    // 			$myfile->move("./myuploads",$filename); // 移动上传文件
	                                
	    //             return response($filename); // 输出内容
	    //             exit();
	    //         }
	    //     }


    	// $data = new data_user_detail;

    	// $data->pic = $file;

    	// $res = $data->save();

    	// if($res){
    	// 	return 1;
    	// }else{
    	// 	return 2;
    	// }



