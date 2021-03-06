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
        $this->call(DataAddressProvincesTableSeeder::class);
        $this->call(DataAddressCitysTableSeeder::class);
        $this->call(DataAddressTownsTableSeeder::class);
        $this->call(Data_UsersTableSeeder::class);
        $this->call(DataRestsTableSeeder::class);
        $this->call(DataUserDetailsTableSeeder::class);
        $this->call(DataFoodCatesTableSeeder::class);
        $this->call(DataRestFoodsTableSeeder::class);
        $this->call(DataRolesTableSeeder::class);
        $this->call(DataPermissionsTableSeeder::class);
        $this->call(IndexUserRoleTableSeeder::class);
        $this->call(IndexRolePermissionTableSeeder::class);
    }
}
