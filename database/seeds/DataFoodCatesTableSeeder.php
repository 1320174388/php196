<?php

use Illuminate\Database\Seeder;

class DataFoodCatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('data_food_cates')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '默认分类',
                'pid' => 0,
                'path' => '0',
                'user_id' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '川菜',
                'pid' => 1,
                'path' => '0-1',
                'user_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '徽菜',
                'pid' => 1,
                'path' => '0-1',
                'user_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '鲁菜',
                'pid' => 1,
                'path' => '0-1',
                'user_id' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '闽菜',
                'pid' => 1,
                'path' => '0-1',
                'user_id' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '苏菜',
                'pid' => 1,
                'path' => '0-1',
                'user_id' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '湘菜',
                'pid' => 1,
                'path' => '0-1',
                'user_id' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '粤菜',
                'pid' => 1,
                'path' => '0-1',
                'user_id' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '浙菜',
                'pid' => 1,
                'path' => '0-1',
                'user_id' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => '快餐',
                'pid' => 1,
                'path' => '0-1',
                'user_id' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => '饮品',
                'pid' => 1,
                'path' => '0-1',
                'user_id' => 1,
            ),
        ));
        
        
    }
}