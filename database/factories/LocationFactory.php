<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Location::class, function (Faker $faker) {
    return [
        'shop_id' => App\Models\Shop::query()->first()->id,

        'name' => $faker->word,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,

        'created_at' => time(),
        'updated_at' => time()
    ];
});
