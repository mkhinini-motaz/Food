<?php

use Faker\Generator as Faker;

$factory->define(App\Model\TransporterPayment::class, function (Faker $faker) {
    return [
        'transporter_id' => App\Model\Transporter::query()->first()->id,

        'name' => $faker->name,
        'description' => $faker->sentence(10, false),
        'amount' => rand (5000, 100000),

        'created_at' => time(),
        'updated_at' => time()
    ];
});
