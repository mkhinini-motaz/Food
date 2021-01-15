<?php

use Faker\Generator as Faker;

$factory->define(App\Models\PromoCode::class, function (Faker $faker) {
    return [
        'code' => $faker->postcode,
        'expires_at' => rand(time(), strtotime('+ 4 months')),
        'max_usage_count' => $faker->randomElement([null, rand(10, 50)]),
        'admin_id' => 1,

        'created_at' => time(),
        'updated_at' => time()
    ];
});
