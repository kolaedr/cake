<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        //
    ];
});

$factory->afterCreating(App\Category::class, function ($category, $faker) {
    $categories = Category::all('id')
    ->push(null)
    ->pluck('id')
    ->random();
    $category->parent_id = $categories;
    $category->save();
});
