<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(Data_Admin_AddrsTableSeeder::class);
        $this->call(Data_UsersTableSeeder::class);
    }
}
