<?php

use Faker\Generator as Faker;

$factory->define(App\Model\ShopPayment::class, function (Faker $faker) {
    return [
        'shop_id' => App\Model\Shop::query()->first()->id,

        // TODO: fill with attributes

        'created_at' => time(),
        'updated_at' => time()
    ];
});
