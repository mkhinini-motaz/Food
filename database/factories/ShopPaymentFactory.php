<?php

namespace Database\Factories;

use App\Models\Shop;
use App\Models\ShopPayment;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShopPaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShopPayment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->name,
            'amount'      => rand (5000, 100000),
            'description' => $this->faker->sentence(10, false),

            'shop_id' => Shop::query()->first()->id,

            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
