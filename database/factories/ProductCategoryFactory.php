<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductCategory;
use App\Category;
use App\Product;
use Faker\Generator as Faker;

$factory->define(ProductCategory::class, function (Faker $faker) {
    $categories = Category::all()->pluck('id');

    $products = Product::all()->pluck('id');

    return [
        'product_id' => $products->random(),
        'category_id' => $categories->random(),
    ];
});
