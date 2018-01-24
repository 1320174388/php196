<?php

use Illuminate\Database\Seeder;

class IndexUserRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('index_user_role')->delete();
        
        \DB::table('index_user_role')->insert(array (
            0 => 
            array (
                'user_id' => 1,
                'role_id' => 1,
            ),
            1 => 
            array (
                'user_id' => 1,
                'role_id' => 2,
            ),
            2 => 
            array (
                'user_id' => 1,
                'role_id' => 3,
            ),
        ));
        
        
    }
}