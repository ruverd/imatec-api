<?php

use Faker\Generator as Faker;
use App\Entities\StockMoveType;

$factory->define(StockMoveType::class, function (Faker $faker) {
    return [
        'type' => $faker->word
    ];
});