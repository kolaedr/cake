<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Delivery;
use Faker\Generator as Faker;

$factory->define(Delivery::class, function (Faker $faker) {
    return [
        'street' => $faker->streetName,
        'build' =>	$faker->buildingNumber,
        'build_index' => $faker->randomLetter,	
        'room' => $faker->numberBetween($min = 1, $max = 150),
        'comments' => $faker->words(2, true),
    ];
});
