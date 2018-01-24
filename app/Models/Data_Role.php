<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data_Role extends Model
{
    public $table = 'data_roles';

    public $primaryKey = "id";

    public $guarded = [];

    public $timestamps = false;

    //查找当前用户的角色  多对多
    public function permission()
    {
        return $this->belongsToMany('App\Models\Data_Permission','index_role_permission','role_id','permission_id');
    }
}
