<?php

use Illuminate\Database\Seeder;

class DataRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('data_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_name' => '超级管理员',
                'role_description' => '这个网站我最大',
            ),
            1 =>
            array (
                'id' => 2,
                'role_name' => '店铺管理员',
                'role_description' => '我可以管理店铺列表',
            ),
            2 =>
            array (
                'id' => 3,
                'role_name' => '角色管理员',
                'role_description' => '我可以操作任何管理员的权限',
            ),
        ));
        
        
    }
}