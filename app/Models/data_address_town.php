<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_address_town extends Model
{
	public $table = 'data_address_towns';

    public $timestamps = false;

    public function data_rest()
    {
    	return $this->hasMany('App\Models\data_rest','cityCode','id');
    }
}
