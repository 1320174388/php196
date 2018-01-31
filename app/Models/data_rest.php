<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_rest extends Model
{
    public $primaryKey = 'user_id';
    public $table = 'data_rests';
    public $timestamps = false;
    

	public function data_user()
    {	
        return $this->belongsTo('App\Models\data_user','user_id','id');
    }

    public function data_address_town()
    {
    	return $this->hasOne('App\Models\data_address_town','id','cityCode');
    }

}