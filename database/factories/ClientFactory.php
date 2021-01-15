<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Client::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt('azerty'),
        'phone' => $faker->phoneNumber,
        'is_phone_confirmed' => rand(0, 1),
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'last_login_at' => null,

        'created_at' => time(),
        'updated_at' => time()
    ];
});
