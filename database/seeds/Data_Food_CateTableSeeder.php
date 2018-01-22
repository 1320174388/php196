<?php

use Illuminate\Database\Seeder;

class Data_Food_CateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('data_food_cates')->insert([
            'name' => '默认分类',
            'pid' => 0,
            'path' => '0',
            'user_id' => 0,
        ]);
    }
}
