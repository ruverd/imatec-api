<?php

use Faker\Generator as Faker;
use App\Entities\Department;

$factory->define(Department::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle
    ];
});