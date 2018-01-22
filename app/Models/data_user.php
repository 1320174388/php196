<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_user extends Model
{
	public $table = 'data_users';

	public function data_user_detail()
    {
        return $this->hasOne('App\Models\data_user_detail','user_id','id');
    }

    public function data_rest()
    {
        return $this->hasOne('App\Models\data_rest','user_id','id');
    }

}
