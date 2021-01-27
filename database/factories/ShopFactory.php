<?php

namespace Database\Factories;

use App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->word,
            'logo'  => $this->faker->imageUrl(),
            'phone' => $this->faker->phoneNumber,

            'is_approved'           => rand(0, 1),
            'min_order_price'       => rand(20, 100) * 100,
            'pricing_category'      => rand(1, 5),
            'average_ready_minutes' => rand(1, 3) > 1 ? rand(15, 45) : null,

            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
