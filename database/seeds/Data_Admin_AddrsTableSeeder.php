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
        $strs = Crypt::encrypt($str);
        \DB::table('data_admin_addrs')->insert([
            'name' => 'admin',
            'password' => $strs,
            'email' => '112511@qq.com',
            'phone' => '11251138581',
            'avatar' => 'default2.jpg',
            'status' => 1,
        ]);
        $data = [];
        for( $i = 0; $i<100; $i++){
            $tmp['name'] = 'P_'.str_random('8');
            $tmp['password'] = encrypt('123456');
            $tmp['email'] = str_random('10').'@sina.com';
            $tmp['phone'] = '127'.mt_rand(10000000,99999999);
            $tmp['avatar'] = 'default'.mt_rand(1,4).'.jpg';
            $tmp['status'] = mt_rand(2,3);
            $data[] = $tmp;
        }
        \DB::table('data_admin_addrs')->insert($data);
    }

}
