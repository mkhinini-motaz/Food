<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => rand(1, 999) * 100,
        'weight' => rand(1, 500) * 100,

        'created_at' => time(),
        'updated_at' => time()
    ];
});
