<?php

use Illuminate\Database\Seeder;

class DataRestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('data_rests')->insert([
            'name' => '半山妖快餐店',
            'user_id' => 1,
            'cityCode' => '13',
            'nameid' => '半山妖',
            'numberid' => '430122199506053770',
            'phone' => '12312312311',
            'introduce' => '这是一个非常牛逼的店铺',
            'status' => 1,
        ]);
    }
}
