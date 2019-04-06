<?php

use Faker\Generator as Faker;

$factory->define(App\Transporter::class, function (Faker $faker) {
    return [
        'code_name' => $faker->userName,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt('azerty'),
        'starts_working_at' => rand(8, 23),
        'ends_working_at' => rand(0, 23),
        'max_supported_weight' => rand(60, 140) * 100,
        'is_approved' => rand(0, 1),

        'created_at' => time(),
        'updated_at' => time()
    ];
});
