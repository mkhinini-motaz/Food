<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Transporter::class, function (Faker $faker) {
    return [
        'alias' => $faker->userName,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'password' => bcrypt('azerty'),
        'shift_start_time' => '10:00',
        'shift_end_time' => '22:00',
        'is_approved' => rand(0, 1),

        'created_at' => time(),
        'updated_at' => time(),
    ];
});
