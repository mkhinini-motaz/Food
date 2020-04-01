<?php

use Faker\Generator as Faker;

$factory->define(App\Model\ShopUser::class, function (Faker $faker) {
    return [
        'shop_id' => App\Model\Shop::query()->first()->id,

        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'password' => bcrypt('azerty'),
        'role' => $faker->randomElement(App\Model\ShopUser::ROLES),
        'phone' => $faker->phoneNumber,

        'created_at' => time(),
        'updated_at' => time()
    ];
});
