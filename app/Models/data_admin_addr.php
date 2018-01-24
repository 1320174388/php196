<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_admin_addr extends Model
{
    public $table = 'data_admin_addrs';

//    定义关联表的主键
    public $primaryKey = 'id';

	public $timestamps = false;

    //查找当前用户的角色  多对多
    public function roles()
    {
        return $this->belongsToMany('App\Models\Data_Role','index_user_role','user_id','role_id');
    }
}
