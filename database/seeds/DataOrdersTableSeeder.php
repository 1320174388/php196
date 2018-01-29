<?php

use Illuminate\Database\Seeder;

class DataOrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('data_orders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'order_number' => '296215169968395565',
                'user_id' => 102,
                'rest_id' => 1,
                'status' => 1,
                'price' => 188,
                'order_time' => '2018-01-26 20:00:39',
                'address' => '北京，昌平，回龙观',
                'text' => '用户没有留言',
            ),
            1 => 
            array (
                'id' => 2,
                'order_number' => '178615170445763703',
                'user_id' => 102,
                'rest_id' => 1,
                'status' => 0,
                'price' => 58,
                'order_time' => '2018-01-27 09:16:16',
                'address' => '北京，昌平，回龙观',
                'text' => '用户没有留言',
            ),
            2 => 
            array (
                'id' => 3,
                'order_number' => '186015171266972557',
                'user_id' => 102,
                'rest_id' => 1,
                'status' => 0,
                'price' => 594,
                'order_time' => '2018-01-28 08:04:57',
                'address' => '北京，昌平，回龙观',
                'text' => '用户没有留言',
            ),
            3 => 
            array (
                'id' => 4,
                'order_number' => '186015171266972447',
                'user_id' => 102,
                'rest_id' => 1,
                'status' => 0,
                'price' => 34,
                'order_time' => '2018-01-27 09:16:16',
                'address' => '北京，昌平，回龙观',
                'text' => '用户没有留言',
            ),
            4 => 
            array (
                'id' => 5,
                'order_number' => '186015171266972446',
                'user_id' => 102,
                'rest_id' => 1,
                'status' => 0,
                'price' => 12,
                'order_time' => '2018-01-27 09:16:16',
                'address' => '北京，昌平，回龙观',
                'text' => '用户没有留言',
            ),
            5 => 
            array (
                'id' => 6,
                'order_number' => '296215163968395565',
                'user_id' => 102,
                'rest_id' => 1,
                'status' => 0,
                'price' => 213,
                'order_time' => '2018-01-28 08:04:57',
                'address' => '北京，昌平，回龙观',
                'text' => '用户没有留言',
            ),
            6 => 
            array (
                'id' => 7,
                'order_number' => '186015171266972440',
                'user_id' => 102,
                'rest_id' => 1,
                'status' => 0,
                'price' => 123,
                'order_time' => '2018-01-27 09:16:16',
                'address' => '北京，昌平，回龙观',
                'text' => '用户没有留言',
            ),
            7 => 
            array (
                'id' => 8,
                'order_number' => '296715163968395565',
                'user_id' => 102,
                'rest_id' => 1,
                'status' => 0,
                'price' => 123,
                'order_time' => '2018-01-27 09:16:16',
                'address' => '北京，昌平，回龙观',
                'text' => '用户没有留言',
            ),
            8 => 
            array (
                'id' => 9,
                'order_number' => '296215169968395561',
                'user_id' => 102,
                'rest_id' => 1,
                'status' => 0,
                'price' => 123,
                'order_time' => '2018-01-28 08:04:57',
                'address' => '北京，昌平，回龙观',
                'text' => '用户没有留言',
            ),
            9 => 
            array (
                'id' => 10,
                'order_number' => '396215169968395561',
                'user_id' => 102,
                'rest_id' => 1,
                'status' => 0,
                'price' => 123,
                'order_time' => '2018-01-27 09:16:16',
                'address' => '北京，昌平，回龙观',
                'text' => '用户没有留言',
            ),
        ));
        
        
    }
}