<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Category::class, function (Faker $faker) {
    return [
        'shop_id' => App\Model\Shop::query()->first()->id,

        'name' => $faker->word,
        'description' => $faker->sentence(12, false),

        'created_at' => time(),
        'updated_at' => time()
    ];
});
