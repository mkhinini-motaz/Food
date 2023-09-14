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
                'fr'   => $this->faker->word,
                'en'   => $this->faker->word,
                'tnar' => $this->faker->word,
                'tnfr' => $this->faker->word,
                'ar'   => $this->faker->word,
            ],
            'description' => [
                'fr'   => 'Description Français Description Français Description Français Description Français',
                'en'   => 'English Description English Description English Description English Description',
                'tnfr' => 'Description Tounsi Description Tounsi Description Tounsi Description Tounsi',
                'tnar' => 'وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي',
                'ar'   => 'وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي',
            ],

            'type'   => $this->faker->randomElement(Product::TYPES),
            'brand'  => null,
            'photo'  => Category::first()->photo,
            'price'  => rand(1, 99) * 10,
            'profit' => 0,
            'weight' => rand(1, 500) * 100,
            'width'  => rand(1, 50),
            'length' => rand(1, 50),
            'height' => rand(1, 50),
            'order'  => rand(1, 50000) - rand(43, 99) + rand(99, 200),

            'is_visible'  => 1,

            'category_id' => rand(1, 4),

            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
