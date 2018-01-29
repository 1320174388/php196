<?php

use Illuminate\Database\Seeder;

class DataOrderDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('data_order_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'order_number' => '296215169968395565',
                'food_id' => 4,
                'food_num' => 2,
                'price' => 36,
            ),
            1 => 
            array (
                'id' => 2,
                'order_number' => '296215169968395565',
                'food_id' => 3,
                'food_num' => 2,
                'price' => 44,
            ),
            2 => 
            array (
                'id' => 3,
                'order_number' => '296215169968395565',
                'food_id' => 2,
                'food_num' => 3,
                'price' => 108,
            ),
            3 => 
            array (
                'id' => 4,
                'order_number' => '178615170445763703',
                'food_id' => 3,
                'food_num' => 1,
                'price' => 22,
            ),
            4 => 
            array (
                'id' => 5,
                'order_number' => '178615170445763703',
                'food_id' => 4,
                'food_num' => 2,
                'price' => 36,
            ),
            5 => 
            array (
                'id' => 6,
                'order_number' => '186015171266972557',
                'food_id' => 2,
                'food_num' => 3,
                'price' => 108,
            ),
            6 => 
            array (
                'id' => 7,
                'order_number' => '186015171266972557',
                'food_id' => 3,
                'food_num' => 4,
                'price' => 88,
            ),
            7 => 
            array (
                'id' => 8,
                'order_number' => '186015171266972557',
                'food_id' => 4,
                'food_num' => 2,
                'price' => 36,
            ),
            8 => 
            array (
                'id' => 9,
                'order_number' => '186015171266972557',
                'food_id' => 1,
                'food_num' => 3,
                'price' => 96,
            ),
            9 => 
            array (
                'id' => 10,
                'order_number' => '186015171266972557',
                'food_id' => 5,
                'food_num' => 2,
                'price' => 56,
            ),
            10 => 
            array (
                'id' => 11,
                'order_number' => '186015171266972557',
                'food_id' => 7,
                'food_num' => 3,
                'price' => 66,
            ),
            11 => 
            array (
                'id' => 12,
                'order_number' => '186015171266972557',
                'food_id' => 6,
                'food_num' => 2,
                'price' => 72,
            ),
            12 => 
            array (
                'id' => 13,
                'order_number' => '186015171266972557',
                'food_id' => 8,
                'food_num' => 4,
                'price' => 192,
            ),
        ));
        
        
    }
}