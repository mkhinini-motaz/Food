<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Admin::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt('azerty'),
        'role' => $faker->randomElement(App\Models\Admin::ROLES),
        'phone' => $faker->phoneNumber,

        'created_at' => time(),
        'updated_at' => time()
    ];
});
