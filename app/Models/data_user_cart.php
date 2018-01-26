<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_user_cart extends Model
{
    public $table = 'data_user_carts';
    public $timestamps = false;

    public function data_rest_food()
    {
        return $this->hasMany('App\Models\data_rest_food', 'id', 'food_id');
    }
}
