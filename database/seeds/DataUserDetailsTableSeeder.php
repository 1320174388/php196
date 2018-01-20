<?php

use Illuminate\Database\Seeder;

class DataUserDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('data_user_details')->insert([
            'user_id' => 1,
            'money' => 0.00,
        ]);
    }
}
