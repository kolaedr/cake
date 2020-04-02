<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CakeSize;
use Faker\Generator as Faker;

$factory->define(CakeSize::class, function (Faker $faker) {
    $tier = ['1', '2', '3', '1-2', '2-3'];
    return [

        'tier' => $tier[array_rand($tier, 1)],
        'weight_min' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 1.5, $max = 5),
        'weight_max' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 5, $max = 13),
        'piece_min' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 4, $max = 8),
        'piece_max' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 10, $max = 40),
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 300, $max = 400),
        'visible'=>$faker->boolean(),
    ];
});
