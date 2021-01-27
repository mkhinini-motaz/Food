<?php

namespace Database\Factories;

use App\Models\Transporter;
use App\Models\TransporterPayment;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransporterPaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransporterPayment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->name,
            'description' => $this->faker->sentence(10, false),
            'amount'      => rand (5000, 100000),

            'transporter_id' => Transporter::query()->first()->id,

            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
