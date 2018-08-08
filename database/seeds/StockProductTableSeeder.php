<?php

use Illuminate\Database\Seeder;
use App\Entities\StockProduct;

class StockProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(StockProduct::class)->create([
            'id'   => 1,
            'name' => 'Detergente',
            'stock_category_id' => 2,
            'unit_id' => 1,
            'max' => 2,
            'min' => 1,
            'asset' => 0,
            'purchase' => 1,
            'qtd' => 2
        ]);
    }
}
