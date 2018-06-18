<?php

use Illuminate\Database\Seeder;

/**
 * Class - DatabaseSeeder
 *
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(OrganizationTableSeeder::class);
        $this->call(UserStatusTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(StockCategoryTableSeeder::class);
        $this->call(StockSoftwareLicenseStatusTableSeeder::class);
        $this->call(StockAssetStatusTableSeeder::class);
        $this->call(StockMoveTypeTableSeeder::class);
        $this->call(StockSpotTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(AclTableSeeder::class);
    }
}