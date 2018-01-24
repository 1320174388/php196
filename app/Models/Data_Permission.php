<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data_Permission extends Model
{
    public $table = 'data_permissions';

    public $primaryKey = "id";


    public $guarded = [];

    public $timestamps = false;
}
