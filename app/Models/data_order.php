<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_order extends Model
{
    public $table = 'data_orders';

    public $primaryKey = "id";

    public $timestamps = false;

    public function data_order_detail()
    {
    	return $this->hasMany('App\Models\data_order_detail', 'order_number', 'order_number');
    }
    
}
