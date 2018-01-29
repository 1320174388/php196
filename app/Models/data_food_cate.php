<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_food_cate extends Model
{
    public $table = 'data_food_cates';
    
    public $timestamps = false;

    public function data_rest_food(){
    	return $this->hasMany('App\Models\data_rest_food','cate_id','id');
    }
}
