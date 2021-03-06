<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class Data_UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $str = '123123';
        $strs = Crypt::encrypt($str);

        $tmp['name'] = 'qwe123';
        $tmp['email'] = '123123@123.php';
        $tmp['password'] = $strs;
        $tmp['phone'] = '12312312312';
        $tmp['status'] = 1;
        $tmp['avatar'] = 'default1.jpg';
        $tmp['created_at'] = date('Y-m-d H:i:s',time());
        $tmp['updated_at'] = date('Y-m-d H:i:s',time());

        $data[] = $tmp; 

        for( $i = 0; $i<100; $i++){
        	$tmp['name'] = 'P_'.str_random('8');
        	$tmp['email'] = str_random('10').'@sina.com';
        	$tmp['password'] = encrypt('123456');
        	$tmp['phone'] = '127'.mt_rand(10000000,99999999);
        	$tmp['status'] = mt_rand(0,1);
            $tmp['avatar'] = 'default'.mt_rand(1,4).'.jpg';
        	$tmp['created_at'] = date('Y-m-d H:i:s',time());
        	$tmp['updated_at'] = date('Y-m-d H:i:s',time());
        	$data[] = $tmp; 
        }
        \DB::table('data_users')->insert($data);
    }
}
