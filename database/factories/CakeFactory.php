<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cake;
use Faker\Generator as Faker;

$factory->define(Cake::class, function (Faker $faker) {
    return [
        'text_decoration' => $faker->words(2, true),
        'cake_filling_tier_1_id' => App\CakeFilling::all('id')->pluck('id')->random(),
        'cake_filling_tier_2_id' => 1,
        'cake_filling_tier_3_id' => 2,
        'cake_top_decoration_id' => App\CakeTopDecoration::all('id')->pluck('id')->random(),
        'cake_side_decoration_id' => App\CakeSideDecoration::all('id')->pluck('id')->random(),
        'cake_size_id' => App\CakeSize::all('id')->pluck('id')->random(),
        // 'more_ingridient_id' => 1,
        // 'more_decoration_id' => 1,
        'comments' => $faker->words(2, true),
        'order_id' => App\Order::all('id')->pluck('id')->random(),

    ];
});
