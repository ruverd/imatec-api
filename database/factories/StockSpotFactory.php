<?php

use Faker\Generator as Faker;
use App\Entities\StockSpot;

$factory->define(StockSpot::class, function (Faker $faker) {
    return [
        'code' => $faker->currencyCode,
        'description' => $faker->word,
    ];
});