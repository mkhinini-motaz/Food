<?php

use Faker\Generator as Faker;

$factory->define(App\Model\TransporterPayment::class, function (Faker $faker) {
    return [
        'transporter_id' => App\Model\Transporter::query()->first()->id,

        // TODO: fill with attributes

        'created_at' => time(),
        'updated_at' => time()
    ];
});
