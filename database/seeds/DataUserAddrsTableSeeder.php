<?php

use Illuminate\Database\Seeder;

class DataUserAddrsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('data_user_addrs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 102,
                'address' => '北京，昌平，回龙观',
                'addr_phone' => '12312312345',
                'created_at' => '2018-01-25 06:32:47',
                'updated_at' => '2018-01-25 06:32:47',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 102,
                'address' => '河北，昌平，回龙观，',
                'addr_phone' => '12312312345',
                'created_at' => '2018-01-25 06:33:30',
                'updated_at' => '2018-01-25 06:33:30',
            ),
        ));
        
        
    }
}