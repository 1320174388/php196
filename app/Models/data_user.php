<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_user extends Model
{
	public $table = 'data_users';

//    定义关联表的主键
    public $primaryKey = 'id';

	public function data_user_detail()
    {
        return $this->hasOne('App\Models\data_user_detail','user_id','id');
    }

    public function data_rest()
    {
        return $this->hasOne('App\Models\data_rest','user_id','id');
    }
    
    public function data_user_addr()
    {
    	return $this->hasMany('App\Models\data_user_addr', 'user_id', 'id');
    }

    // 查找当前用户的角色  多对多
    public function roles()
    {
        return $this->belongsToMany('App\Models\Data_Role','index_user_role','user_id','role_id');
    }

    public function data_rest_food()
    {
        return $this->hasMany('App\Models\data_rest_food', 'user_id', 'id');
    }
}
