<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt('azerty'),
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'last_login_at' => null,

        'created_at' => time(),
        'updated_at' => time()
    ];
});
