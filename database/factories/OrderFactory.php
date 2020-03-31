<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Order::class, function (Faker $faker) {
    return [

        'message' => $faker->sentence(8),
        'status' => $faker->numberBetween(1, 4),
        'associated_phone' => $faker->phoneNumber,
        'delivery_latitude' => $faker->latitude,
        'delivery_longitude' => $faker->longitude,
        'total_price' => rand(5000, 30000),

        'client_id' => rand(1, 5),
        'transporter_id' => null,
        'promo_code_id' => $faker->randomElement([null, rand(1, 6)]),
        'location_id' => rand(1, 2),

        'to_be_delivered_at' => rand(1, 4) > 1 ? null : strtotime('+30 minutes'),
        'created_at' => time(),
        'updated_at' => time()
    ];
});
