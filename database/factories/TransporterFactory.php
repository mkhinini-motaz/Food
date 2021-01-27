<?php

namespace Database\Factories;

use App\Models\Transporter;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransporterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transporter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'alias'      => $this->faker->userName,
            'first_name' => $this->faker->firstName,
            'last_name'  => $this->faker->lastName,
            'phone'      => $this->faker->phoneNumber,
            'email'      => $this->faker->safeEmail,
            'password'   => bcrypt('azerty'),

            'shift_start_time' => '10:00',
            'shift_end_time'   => '22:00',
            'is_approved'      => rand(0, 1),

            'created_at' => time(),
            'updated_at' => time(),
        ];
    }
}
