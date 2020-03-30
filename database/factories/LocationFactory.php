<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Location::class, function (Faker $faker) {
    return [
        'shop_id' => App\Model\Shop::query()->first()->id,

        'name' => $faker->word,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,

        'created_at' => time(),
        'updated_at' => time()
    ];
});
