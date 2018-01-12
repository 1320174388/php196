<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class Data_Admin_AddrsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $str = '123123';
        $strs = Crypt::encrypt($str)
        \DB::table('data_admin_addrs')->insert([
            'name' => 'admin',
            'password' => $strs,
            'status' => 1,
        ]);
    }
}
