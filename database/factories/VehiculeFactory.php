<?php

use Faker\Generator as Faker;

$factory->define(App\Model\TransporterPayment::class, function (Faker $faker) {
    return [
        'transporter_id' => App\Model\Transporter::query()->first()->id,

        'name' => $faker->name(),
        'manufacturer' => $faker->name(),
        'model' => $faker->name(),
        'cylinder' => $faker->numberBetween(49, 1300),

        'created_at' => time(),
        'updated_at' => time()
    ];
});
