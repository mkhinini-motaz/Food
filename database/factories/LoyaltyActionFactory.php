<?php

namespace Database\Factories;

use App\Models\LoyaltyAction;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoyaltyActionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LoyaltyAction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type'            => $this->faker->randomElement(LoyaltyAction::TYPES),
            'meta'            => '{"text":"written by factory"}',
            'client_id'       => 1,
            'points_rewarded' => rand(1, 100),

            'created_at' => time(),
            'updated_at' => time(),
        ];
    }
}
