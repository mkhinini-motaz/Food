<?php

namespace Database\Factories;

use App\Models\Shop;
use App\Models\ShopUser;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShopUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShopUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shop_id' => Shop::query()->first()->id,

            'first_name' => $this->faker->firstName,
            'last_name'  => $this->faker->lastName,
            'email'      => $this->faker->email,
            'role'       => $this->faker->randomElement(ShopUser::ROLES),
            'phone'      => $this->faker->phoneNumber,
            'password'   => bcrypt('azerty'),

            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
