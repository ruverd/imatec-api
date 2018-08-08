<?php

use Faker\Generator as Faker;
use App\Entities\StockAssetStatus;

$factory->define(StockAssetStatus::class, function (Faker $faker) {
    return [
        'status' => $faker->word
    ];
});