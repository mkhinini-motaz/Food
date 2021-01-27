<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shop_id' => Shop::query()->first()->id,

            'name'        => $this->faker->word,
            'photo'       => $this->faker->imageUrl(),
            'is_visible'  => 1,
            'description' => $this->faker->sentence(12, false),

            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
