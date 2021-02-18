<?php

namespace Database\Factories;

use App\Models\ProductItem;
use App\Models\ProductItemCategory;
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

            'photo' => ProductItemCategory::first()->photo,
            'price' => rand(1, 250) * 100,

            'is_visible'  => 1,

            'product_item_category_id' => rand(1, 4),

            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
