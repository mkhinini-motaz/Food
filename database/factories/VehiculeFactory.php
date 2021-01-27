<?php

namespace Database\Factories;

use App\Models\Transporter;
use App\Models\Vehicule;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'transporter_id' => Transporter::query()->first()->id,

            'name'         => $this->faker->name(),
            'model'        => $this->faker->name(),
            'cylinder'     => $this->faker->numberBetween(49, 1300),
            'manufacturer' => $this->faker->name(),

            'max_supported_weight' => rand(60, 140) * 100,
            'max_supported_volume' => rand(60, 140) * 100,

            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
