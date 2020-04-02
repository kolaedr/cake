<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all('id')->pluck('id')->random(),
        'status_id' => App\Status::all('id')->pluck('id')->random(),
        'delivery_id' => 1,
        'count' => 1,
        'booking' => $faker->dateTime($max = 'now', $timezone = null),
        // 'delivery_id' => App\Status::all('id')->pluck('id')->random(),
        'comments' =>  App\Delivery::all('id')->pluck('id')->random(),
    ];
});
