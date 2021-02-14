<?php

namespace Database\Factories;

use App\Models\PromoCode;

use Illuminate\Database\Eloquent\Factories\Factory;

class PromoCodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PromoCode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code'             => $this->faker->postcode,
            'expires_at'       => rand(time(), strtotime('+ 4 months')),
            'max_usage_count'  => $this->faker->randomElement([ null, rand(10, 50) ]),
            'reduction_amount' => (rand(1, 10) * 10 + $this->faker->randomElement([0, 5])) * 100,

            'shop_id'  => 1,
            'admin_id' => 1,

            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
