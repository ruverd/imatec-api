<?php

use Illuminate\Database\Seeder;
use App\Entities\Department;

/**
 * Class - DepartmentTableSeeder
 *
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Department::class)->create([
            'id'   => 1,
            'name' => 'TI'
        ]);
    }
}