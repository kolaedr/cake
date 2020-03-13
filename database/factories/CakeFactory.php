<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cake;
use Faker\Generator as Faker;

$factory->define(Cake::class, function (Faker $faker) {
    return [
        'text_decoration' => $faker->words(2, true),
        'cake_filling_lavel_1_id' => App\CakeFilling::all('id')->pluck('id')->random(),
        'cake_filling_lavel_2_id' => 1,
        'cake_filling_lavel_3_id' => 2,
        'cake_top_decoration_id' => App\CakeTopDecoration::all('id')->pluck('id')->random(),
        'cake_side_decoration_id' => App\CakeSideDecoration::all('id')->pluck('id')->random(),
        'cake_size_id' => App\CakeSize::all('id')->pluck('id')->random(),
        'more_ingridient_id' => 1,
        'more_decoration_id' => 1,
        'comment' => $faker->words(2, true),
        'booking_time' => $faker->dateTime($max = 'now', $timezone = null),
    ];
});
        