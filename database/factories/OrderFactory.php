<?php

namespace Database\Factories;

use App\Models\Order;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'message'     => $this->faker->sentence(8),
            'status'      => $this->faker->numberBetween(1, 4),
            'total_price' => rand(5000, 30000),

            'associated_phone'   => $this->faker->phoneNumber,
            'delivery_latitude'  => $this->faker->latitude,
            'delivery_longitude' => $this->faker->longitude,

            'client_id'      => 1,
            'transporter_id' => null,
            'promo_code_id'  => 1,
            'location_id'    => 1,

            'to_be_delivered_at' => rand(1, 4) > 1 ? null : strtotime('+30 minutes'),
            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
