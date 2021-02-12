<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => [
                'fr' => $this->faker->word,
                'en' => $this->faker->word,
                'tn' => $this->faker->word,
                'ar' => $this->faker->word,
            ],
            'description' => [
                'fr' => 'Français Français Français Français Français Français Français Français Français Français Français Français',
                'en' => 'English English English English English English English English English English English English',
                'tn' => 'Tounsi Tounsi Tounsi Tounsi Tounsi Tounsi Tounsi Tounsi Tounsi Tounsi Tounsi Tounsi Tounsi Tounsi Tounsi',
                'ar' => 'عربي عربي عربي عربي عربي عربي عربي عربي عربي عربي عربي عربي عربي عربي عربي عربي',
            ],

            'type'   => $this->faker->randomElement(Product::TYPES),
            'photo'  => Category::first()->photo,
            'price'  => rand(1, 250) * 100,
            'weight' => rand(1, 500) * 100,
            'width'  => rand(1, 50),
            'length' => rand(1, 50),
            'height' => rand(1, 50),

            'is_visible'  => 1,

            'category_id' => rand(1, 4),

            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
