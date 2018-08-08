<?php

use Illuminate\Database\Seeder;
use App\Entities\StockCategory;

/**
 * Class - StockCategoryTableSeeder
 *
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class StockCategoryTableSeeder extends Seeder
{
    public function run()
    {
        factory(StockCategory::class)->create([
            'id'   => 1,
            'name' => 'Farmácia'
        ]);

        factory(StockCategory::class)->create([
            'id'   => 2,
            'name' => 'Limpeza'
        ]);

        factory(StockCategory::class)->create([
            'id'   => 3,
            'name' => 'Cozinha'
        ]);

        factory(StockCategory::class)->create([
            'id'   => 4,
            'name' => 'Informática'
        ]);
    }
}