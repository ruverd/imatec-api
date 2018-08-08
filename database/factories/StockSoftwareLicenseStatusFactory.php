<?php

use Faker\Generator as Faker;
use App\Entities\StockSoftwareLicenseStatus;

$factory->define(StockSoftwareLicenseStatus::class, function (Faker $faker) {
    return [
        'status' => $faker->word
    ];
});