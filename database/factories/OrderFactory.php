<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [

        'message' => $faker->sentence(8),
        'status' => $faker->numberBetween(1, 4),
        'associated_phone' => $faker->phoneNumber,
        'delivery_address' => $faker->address,

        'client_id' => rand(1, 5),
        'transporter_id' => null,
        'promo_code_id' => $faker->randomElement([null, rand(1, 6)]),
        'shop_id' => rand(1, 2),

        'created_at' => time(),
        'updated_at' => time()
    ];
});
