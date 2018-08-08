<?php

use Faker\Generator as Faker;
use App\Entities\Unit;

$factory->define(Unit::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'code' => $faker->countryCode
    ];
});