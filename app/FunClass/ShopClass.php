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
}
