<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_user_addr extends Model
{
    public $table = 'data_user_addrs';

    public function data_user()
    {
    	return $this->belongsTo('App\Models\data_user', 'user_id', 'id');


    }
}
