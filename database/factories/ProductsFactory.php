<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'slug' => $faker->word,
        'details' => $faker->text,
        'price' => $faker->numberBetween(50,150),
        'shipping_cost' => $faker->numberBetween(150,2500),
        'description' => $faker->sentence,
        'category_id' => $faker->numberBetween(1,5),
        'image_path' => $faker->imageUrl(320,240),
    ];
});
