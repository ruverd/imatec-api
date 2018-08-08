<?php

use Faker\Generator as Faker;
use App\Entities\StockProduct;

$factory->define(StockProduct::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'stock_category_id' => 1,
        'unit_id' => 1,
        'max' => 2,
        'min' => 1,
        'asset' => 0,
        'purchase' => 1,
        'qtd' => 2
    ];
});
