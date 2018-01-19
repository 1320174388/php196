<?php

use Illuminate\Database\Seeder;

class Data_Rest_FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for($i = 0; $i < 10; $i++)
        {
    		$tmp['name'] = 'P_'.str_random(5);
    		$tmp['cate_id'] = str_random(10);
    		$tmp['price'] = mt_rand(12, 50);
    		$tmp['img'] = 'default.jpg';
    		$tmp['stock'] = 100;
    		$tmp['sales'] = 0;
    		$data[] = $tmp;
        }

        \DB::table('data_rest_foods')->insert($data);
    }
}
