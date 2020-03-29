<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'category_id' => rand(1, \App\Category::all()->count()),
        'user_id' => 2,
        'title' => $faker->sentence,
        'description' => implode(' ', $faker->sentences(4)),
        'priority' => rand(1, 4),
        'status' => 1
    ];
});
