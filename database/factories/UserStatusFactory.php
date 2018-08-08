<?php

use Faker\Generator as Faker;
use App\Entities\UserStatus;

$factory->define(UserStatus::class, function (Faker $faker) {
    return [
        'status' => $faker->company
    ];
});