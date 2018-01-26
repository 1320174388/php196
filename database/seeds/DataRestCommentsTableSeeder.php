<?php

use Illuminate\Database\Seeder;

class DataRestCommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_rest_comments')->delete();
        
        \DB::table('data_rest_comments')->insert(array (
            0 => 
            array (
                'id' => 14,
                'user_id' => 1,
                'rest_id' => 1,
                'status' => 4,
                'content' => 'asdfasdfasdfasdf',
                'time' => '1516955151',
            ),
            1 => 
            array (
                'id' => 15,
                'user_id' => 1,
                'rest_id' => 1,
                'status' => 4,
                'content' => '11111111111111111',
                'time' => '1516955163',
            ),
            2 => 
            array (
                'id' => 16,
                'user_id' => 1,
                'rest_id' => 1,
                'status' => 4,
                'content' => 'asdfadsfsadf',
                'time' => '1516955204',
            ),
            3 => 
            array (
                'id' => 17,
                'user_id' => 1,
                'rest_id' => 1,
                'status' => 4,
                'content' => '123123213213213',
                'time' => '1516955305',
            ),
            4 => 
            array (
                'id' => 18,
                'user_id' => 1,
                'rest_id' => 1,
                'status' => 4,
                'content' => 'adfdsafasdfsadf',
                'time' => '1516955477',
            ),
            5 => 
            array (
                'id' => 19,
                'user_id' => 1,
                'rest_id' => 1,
                'status' => 4,
                'content' => 'adfadsfdsaf',
                'time' => '1516955551',
            ),
            6 => 
            array (
                'id' => 20,
                'user_id' => 1,
                'rest_id' => 1,
                'status' => 4,
                'content' => 'adfadsfasdfsadf',
                'time' => '1516955598',
            ),
            7 => 
            array (
                'id' => 21,
                'user_id' => 1,
                'rest_id' => 1,
                'status' => 10,
                'content' => 'asdfasdfasdfadsf',
                'time' => '1516956114',
            ),
            8 => 
            array (
                'id' => 22,
                'user_id' => 1,
                'rest_id' => 1,
                'status' => 6,
                'content' => 'adsfadsfsadf',
                'time' => '1516956680',
            ),
            9 => 
            array (
                'id' => 23,
                'user_id' => 102,
                'rest_id' => 1,
                'status' => 8,
                'content' => 'sdfgdsfgdsfgfdsg',
                'time' => '1516964671',
            ),
        ));
        
        
    }
}