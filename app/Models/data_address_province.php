<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_address_province extends Model
{
	public $table = 'data_address_provinces';

    public $timestamps = false;

    public function data_address_city(){
    	return $this->hasMany('App\Models\data_address_city','provinceCode','code');
    }
}
