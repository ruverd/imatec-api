<?php

use Illuminate\Database\Seeder;
use App\Entities\StockSpot;

/**
 * Class - StockSpotTableSeeder
 *
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class StockSpotTableSeeder extends Seeder
{
    public function run()
    {
        factory(StockSpot::class)->create([
            'id'   => 1,
            'code' => 'EXTERNO/CLIENTE',
            'description' => 'Código externo'
        ]);

        factory(StockSpot::class)->create([
            'id'   => 2,
            'code' => 'ACS 222',
            'description' => ''
        ]);

        factory(StockSpot::class)->create([
            'id'   => 3,
            'code' => 'CDHU',
            'description' => ''
        ]);

        factory(StockSpot::class)->create([
            'id'   => 4,
            'code' => 'COT 1007',
            'description' => ''
        ]);

        factory(StockSpot::class)->create([
            'id'   => 5,
            'code' => 'EMB 199',
            'description' => ''
        ]);

        factory(StockSpot::class)->create([
            'id'   => 6,
            'code' => 'MIR 254',
            'description' => ''
        ]);

        factory(StockSpot::class)->create([
            'id'   => 7,
            'code' => 'PDC',
            'description' => ''
        ]);

        factory(StockSpot::class)->create([
            'id'   => 8,
            'code' => 'TEC 66',
            'description' => ''
        ]);
    }
}