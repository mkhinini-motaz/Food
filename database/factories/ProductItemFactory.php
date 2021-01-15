<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ProductItem::class, function (Faker $faker) {
    $productItemCategoryId = rand(1, 9);

    return [
        'name' => $faker->city,
        'description' => $faker->sentence(10, false),
        'brand' => $faker->sentence(3),
        'photo' => \App\Models\ProductItemCategory::first()->photo,
        'price' => rand(1, 250) * 100,
        'product_item_category_id' => $productItemCategoryId,

        'created_at' => time(),
        'updated_at' => time()
    ];
});
