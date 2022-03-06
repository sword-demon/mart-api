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
        'poster' => $faker->imageUrl(),

        'category_id' => \App\Models\Category::all()->random(1)->first()->id,
        'brand' => $faker->randomElement(['小米', '华为', '苹果', 'Nike', 'lenove'])
    ];
});
