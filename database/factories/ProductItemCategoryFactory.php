<?php

namespace Database\Factories;

use App\Models\ProductItemCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductItemCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductItemCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->word,
            'photo' => $this->faker->imageUrl(),

            'description' => $this->faker->sentence(12, false),
            'is_visible'  => 1,

            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
