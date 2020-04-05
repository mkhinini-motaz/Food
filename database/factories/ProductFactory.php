<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'description' => $faker->sentence(10, false),
        'photo' => $faker->imageUrl(),
        'price' => rand(1, 250) * 100,
        'weight' => rand(1, 500) * 100,
        'width' => rand(1, 50),
        'length' => rand(1, 50),
        'height' => rand(1, 50),
        'category_id' => rand(1, 2),

        'created_at' => time(),
        'updated_at' => time()
    ];
});
