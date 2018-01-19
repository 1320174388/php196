<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_address_city extends Model
{
	public $table = 'data_address_citys';

    public $timestamps = false;

    public function data_address_town(){
    	return $this->hasMany('App\Models\data_address_town','cityCode','code');
    }
}
