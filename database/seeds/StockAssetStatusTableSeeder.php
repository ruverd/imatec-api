<?php

use Illuminate\Database\Seeder;
use App\Entities\StockAssetStatus;

/**
 * Class - StockAssetStatusTableSeeder
 *
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class StockAssetStatusTableSeeder extends Seeder
{
    public function run()
    {
        factory(StockAssetStatus::class)->create([
            'id'   => 1,
            'status' => 'Alocado'
        ]);

        factory(StockAssetStatus::class)->create([
            'id'   => 2,
            'status' => 'Disponível'
        ]);

        factory(StockAssetStatus::class)->create([
            'id'   => 3,
            'status' => 'Manutenção'
        ]);

        factory(StockAssetStatus::class)->create([
            'id'   => 4,
            'status' => 'Desativado'
        ]);

        factory(StockAssetStatus::class)->create([
            'id'   => 5,
            'status' => 'Não Localizado'
        ]);
    }
}