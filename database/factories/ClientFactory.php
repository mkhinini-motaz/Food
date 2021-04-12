<?php

namespace Database\Factories;

use App\Models\Client;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name'  => $this->faker->lastName,
            'password'   => bcrypt('azerty'),
            'email'      => $this->faker->email,
            'phone'      => $this->faker->phoneNumber,
            'latitude'   => $this->faker->latitude,
            'longitude'  => $this->faker->longitude,

            'shop_id' => 1,

            'last_login_at'      => null,
            'is_phone_confirmed' => rand(0, 1),

            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
