<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ShopPayment::class, function (Faker $faker) {
    return [
        'shop_id' => App\Models\Shop::query()->first()->id,

        'name' => $faker->name,
        'description' => $faker->sentence(10, false),
        'amount' => rand (5000, 100000),

        'created_at' => time(),
        'updated_at' => time()
    ];
});
