<?php

use Faker\Generator as Faker;

$factory->define(\App\Model\OrderProduct::class, function (Faker $faker) {
    return [

        'order_id' => rand(1, 500),
        'product_id' => rand(1, 100),
        'count' => rand(1, 12),

        'created_at' => time(),
        'updated_at' => time()
    ];
});
