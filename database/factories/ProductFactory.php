<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->unique()->slug,
        'description' => $faker->sentence,
        'price' => $faker->randomDigit(),
        'poster' => $faker->imageUrl()
    ];
});
