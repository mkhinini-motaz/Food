<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Shop::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'logo' => $faker->imageUrl(),
        'phone' => $faker->phoneNumber,
        'pricing_category' => rand(1, 5),
        'min_order_price' => rand(20, 100) * 100,
        'average_ready_minutes' => rand(1, 3) > 1 ? rand(15, 45) : null,
        'is_approved' => rand(0, 1),

        'created_at' => time(),
        'updated_at' => time()
    ];
});
