<?php

use Illuminate\Database\Seeder;
use App\Entities\Unit;

/**
 * Class - UnitTableSeeder
 *
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class UnitTableSeeder extends Seeder
{
    public function run()
    {
        factory(Unit::class)->create([
            'id'   => 1,
            'name' => 'Unitário',
            'code' => 'UN'
        ]);
    }
}