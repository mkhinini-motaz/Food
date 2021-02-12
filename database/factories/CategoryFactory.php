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

            'name' => [
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
            'photo'       => $this->faker->imageUrl(),
            'is_visible'  => 1,

            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
