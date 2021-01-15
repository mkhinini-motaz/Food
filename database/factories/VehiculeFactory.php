<?php

use Faker\Generator as Faker;

$factory->define(App\Models\TransporterPayment::class, function (Faker $faker) {
    return [
        'transporter_id' => App\Models\Transporter::query()->first()->id,

        'name' => $faker->name(),
        'manufacturer' => $faker->name(),
        'model' => $faker->name(),
        'cylinder' => $faker->numberBetween(49, 1300),
        'max_supported_weight' => rand(60, 140) * 100,
        'max_supported_volume' => rand(60, 140) * 100,

        'created_at' => time(),
        'updated_at' => time()
    ];
});
