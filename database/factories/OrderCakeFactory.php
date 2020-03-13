<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderCake;
use Faker\Generator as Faker;

$factory->define(OrderCake::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all('id')->pluck('id')->random(),
        'cake_id' => App\Cake::all('id')->pluck('id')->random(),
        'count' => $faker->numberBetween($min = 1, $max = 4),
    ];
});
