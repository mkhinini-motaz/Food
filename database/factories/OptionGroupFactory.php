<?php

namespace Database\Factories;

use App\Models\OptionGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class OptionGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OptionGroup::class;

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
                'fr'   => 'Description Français Description Français Description Français Description Français Description Français',
                'en'   => 'English Description English Description English Description English Description English Description',
                'tnfr' => 'Description Tounsi Description Tounsi Description Tounsi Description Tounsi Description Tounsi',
                'tnar' => 'وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي',
                'ar'   => 'وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي',
            ],

            'photo' => $this->faker->imageUrl(),
            'is_visible'  => 1,
            'shop_id'  => 1,

            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
