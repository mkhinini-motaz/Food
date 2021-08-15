<?php

namespace Database\Factories;

use App\Models\Shop;
use App\Models\Client;

use App\Repositories\ClientRepository;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'invite_code' => Str::random(Client::INVITE_CODE_LENGTH),
            'first_name'  => $this->faker->firstName,
            'last_name'   => $this->faker->lastName,
            'password'    => bcrypt('azerty'),
            'email'       => $this->faker->email,
            'phone'       => $this->faker->phoneNumber,

            'last_login_at'      => null,
            'is_phone_confirmed' => rand(0, 1),

            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
