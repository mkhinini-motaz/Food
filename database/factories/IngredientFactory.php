<?php

namespace Database\Factories;

use App\Models\Ingredient;
use App\Models\IngredientCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ingredient::class;

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
                'fr' => 'Description Français Description Français Description Français Description Français Description Français',
                'en' => 'English Description English Description English Description English Description English Description',
                'tn' => 'Description Tounsi Description Tounsi Description Tounsi Description Tounsi Description Tounsi',
                'ar' => 'وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي',
            ],

            'photo' => IngredientCategory::first()->photo,
            'price' => 0,

            'is_visible'  => 1,

            'ingredient_category_id' => rand(1, 4),

            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
