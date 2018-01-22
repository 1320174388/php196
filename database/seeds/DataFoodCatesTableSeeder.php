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
                'name' => '鲁菜',
                'pid' => 1,
                'path' => '0-1',
                'user_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '粤菜',
                'pid' => 1,
                'path' => '0-1',
                'user_id' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '苏菜',
                'pid' => 1,
                'path' => '0-1',
                'user_id' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '浙菜',
                'pid' => 1,
                'path' => '0-1',
                'user_id' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '闽菜',
                'pid' => 1,
                'path' => '0-1',
                'user_id' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '湘菜',
                'pid' => 1,
                'path' => '0-1',
                'user_id' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '徽菜',
                'pid' => 1,
                'path' => '0-1',
                'user_id' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => '传统川菜',
                'pid' => 2,
                'path' => '0-1-2',
                'user_id' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => '新式川菜',
                'pid' => 2,
                'path' => '0-1-2',
                'user_id' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => '蓉派川菜',
                'pid' => 2,
                'path' => '0-1-2',
                'user_id' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => '渝派川菜',
                'pid' => 2,
                'path' => '0-1-2',
                'user_id' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => '胶东菜',
                'pid' => 3,
                'path' => '0-1-3',
                'user_id' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => '济南菜',
                'pid' => 3,
                'path' => '0-1-3',
                'user_id' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => '孔府菜',
                'pid' => 3,
                'path' => '0-1-3',
                'user_id' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => '广府',
                'pid' => 4,
                'path' => '0-1-4',
                'user_id' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => '客家',
                'pid' => 4,
                'path' => '0-1-4',
                'user_id' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => '潮汕',
                'pid' => 4,
                'path' => '0-1-4',
                'user_id' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => '扬菜',
                'pid' => 5,
                'path' => '0-1-5',
                'user_id' => 1,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => '苏锡菜',
                'pid' => 5,
                'path' => '0-1-5',
                'user_id' => 1,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => '金陵菜',
                'pid' => 5,
                'path' => '0-1-5',
                'user_id' => 1,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => '徐海菜',
                'pid' => 5,
                'path' => '0-1-5',
                'user_id' => 1,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => '皖南菜',
                'pid' => 9,
                'path' => '0-1-9',
                'user_id' => 1,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => '沿江菜',
                'pid' => 9,
                'path' => '0-1-9',
                'user_id' => 1,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => '沿淮菜',
                'pid' => 9,
                'path' => '0-1-9',
                'user_id' => 1,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => '苏沪菜',
                'pid' => 6,
                'path' => '0-1-6',
                'user_id' => 1,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => '杭州菜',
                'pid' => 6,
                'path' => '0-1-6',
                'user_id' => 1,
            ),
        ));
        
        
    }
}