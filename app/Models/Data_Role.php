<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data_Role extends Model
{
    public $table = 'data_role';

    public $primaryKey = "id";

    public $guarded = [];

    public $timestamps = false;
}
