<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

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
            'photo' => $this->faker->imageUrl(),
            'service_area_id' => 1,
        ];
    }
}
