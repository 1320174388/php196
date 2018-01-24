<?php

use Illuminate\Database\Seeder;

class IndexRolePermissionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('index_role_permission')->delete();
        
        \DB::table('index_role_permission')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'permission_id' => 1,
            ),
            1 => 
            array (
                'role_id' => 1,
                'permission_id' => 2,
            ),
            2 => 
            array (
                'role_id' => 2,
                'permission_id' => 5,
            ),
            3 => 
            array (
                'role_id' => 3,
                'permission_id' => 3,
            ),
            4 => 
            array (
                'role_id' => 3,
                'permission_id' => 4,
            ),
        ));
        
        
    }
}