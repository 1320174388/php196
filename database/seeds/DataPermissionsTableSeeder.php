<?php

use Illuminate\Database\Seeder;

class DataPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('data_permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'permission_name' => '管理员列表',
                'permission_des' => 'admin/user',
            ),
            1 =>
            array (
                'id' => 2,
                'permission_name' => '添加管理员',
                'permission_des' => 'admin/user/create',
            ),
            2 =>
            array (
                'id' => 3,
                'permission_name' => '添加角色',
                'permission_des' => 'admin/role/create',
            ),
            3 =>
            array (
                'id' => 4,
                'permission_name' => '角色列表',
                'permission_des' => 'admin/role',
            ),
            4 =>
            array (
                'id' => 5,
                'permission_name' => '店铺列表',
                'permission_des' => 'admin/shop',
            ),
        ));
    }
}