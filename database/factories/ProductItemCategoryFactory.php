<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ProductItemCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence(12, false),
        'photo' => $faker->imageUrl(),
        'is_visible' => 1,

        'created_at' => time(),
        'updated_at' => time()
    ];
});
