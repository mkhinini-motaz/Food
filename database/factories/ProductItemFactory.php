<?php

namespace Database\Factories;

use App\Models\ProductItem;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->city,
            'brand' => $this->faker->sentence(3),
            'photo' => \App\Models\ProductItemCategory::first()->photo,
            'price' => rand(1, 250) * 100,

            'description' => $this->faker->sentence(10, false),
            'is_visible'  => 1,

            'product_item_category_id' => rand(1, 4),

            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
