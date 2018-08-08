<?php

use Illuminate\Database\Seeder;
use App\Entities\StockMoveType;

/**
 * Class - StockMoveTypeTableSeeder
 *
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class StockMoveTypeTableSeeder extends Seeder
{
    public function run()
    {
        factory(StockMoveType::class)->create([
            'id'   => 1,
            'type' => 'Entrada'
        ]);

        factory(StockMoveType::class)->create([
            'id'   => 2,
            'type' => 'Saída'
        ]);

        factory(StockMoveType::class)->create([
            'id'   => 3,
            'type' => 'Auditoria'
        ]);

        factory(StockMoveType::class)->create([
            'id'   => 4,
            'type' => 'Movimentação'
        ]);
    }
}