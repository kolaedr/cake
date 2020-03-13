<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AdditionalFiller;
use Faker\Generator as Faker;

$factory->define(AdditionalFiller::class, function (Faker $faker) {
    $name = $faker->words(2, true);
    return [
        'name' => $name,
        'slug' => \Str::slug($name, '-'),
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 50, $max = 5000),
        'image' => 'images',
        'describe' => $faker->realText($maxNbChars = 500),
        'visible'=>$faker->boolean(),
    ];
});
