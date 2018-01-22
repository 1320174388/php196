<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    public $table = 'category';

    public $primaryKey = "cate_id";

//    public $fillable = ['']

    public $guarded = [];

    public $timestamps = false;


    public function getCate()
    {
        //获取所有的分类数据
        $cates = $this->orderBy('cate_order','asc')->get();
        //调用cate方法，对分类数据进行格式化（排序、二级类缩进）
//        return $this->Cate($cates);
        return self::Cate($cates);
    }

    /**
     * 获取格式化后的分类数据
     */
    public static function Cate($category)
    {
        //1 定义一个空数组，存放格式化后的分类数据
        $arr = [];

        //2 对分类数据进行排序(先遍历获取一级类，在获取某个一级类时接着或者这个一级类下的二级类)


        foreach ($category as $k=>$v){
            //        2.1 获取一级类
            if($v->cate_pid == 0){
                $v['catenames'] = $v['cate_name'];
                $arr[] = $v;

                foreach ($category as $m=>$n){
                    //2.2 获取当前一级类下的二级类
                    if($n->cate_pid == $v->cate_id){
                        $n['catenames'] = '|----'.$n['cate_name'];
                        $arr[] = $n;
                    }
                }
            }
        }


        return $arr;
    }
}
