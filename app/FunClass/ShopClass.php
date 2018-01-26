<?php

namespace App\FunClass;

class ShopClass
{
   	static function children($arr,$pid=0,$level=1){
   		$data = [];
    	foreach($arr as $v){
    		if($v->pid == $pid){
    			$v->name = str_repeat('&nbsp;&nbsp;',($level-1)*2).'['.$v->name.']';
    			$data[] = $v;
    			$data = array_merge($data,self::children($arr,$v->id,$level+1));
    		}
    	}
    	return $data;
    }

    static function doUpload($request) // 控制器
    {
        if($request->hasFile("avatar")){ //判断是否有上传
            
            $myfile = $request->file("avatar");//获取上传信息
            
            if($myfile->isValid()){ // 确认上传的文件是否成功

                $picname = $myfile->getClientOriginalName(); // 获取文件名
                $ent = $myfile->getClientOriginalExtension();// 获取扩展名
                
                $filename = time().rand(1000,9999).".".$ent; // 拼接文件名
                $myfile->move("./shopUploads",$filename); // 移动上传文件
                                
                return $filename; // 输出内容
                exit();
            }
        }
    }

    static function Total_price($arr){
        $num = 0;
        foreach($arr as $k=>$v){
            $num += $v->price;
        }
        return $num;
    }
}
