<?php

use Faker\Generator as Faker;
use App\Entities\StockCategory;

$factory->define(StockCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName
    ];
});