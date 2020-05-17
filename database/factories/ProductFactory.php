<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Product::class, function (Faker $faker) {
    $categoryId = rand(1, 9);

    return [
        'name' => $faker->city,
        'description' => $faker->sentence(10, false),
        'brand' => $faker->sentence(3),
        'photo' => \DB::table('categories')->where('id', $categoryId)->select('photo')->first()->photo,
        'price' => rand(1, 250) * 100,
        'weight' => rand(1, 500) * 100,
        'width' => rand(1, 50),
        'length' => rand(1, 50),
        'height' => rand(1, 50),
        'category_id' => $categoryId,

        'created_at' => time(),
        'updated_at' => time()
    ];
});
