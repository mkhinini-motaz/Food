<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    $categoryId = rand(1, 9);

    return [
        'name' => $faker->city,
        'type' => $faker->randomElement(\App\Models\Product::TYPES),
        'description' => $faker->sentence(10, false),
        'brand' => null,
        'photo' => \App\Models\Category::first()->photo,
        'price' => rand(1, 250) * 100,
        'weight' => rand(1, 500) * 100,
        'width' => rand(1, 50),
        'length' => rand(1, 50),
        'height' => rand(1, 50),
        'category_id' => $categoryId,
        'is_visible' => 1,

        'created_at' => time(),
        'updated_at' => time()
    ];
});
