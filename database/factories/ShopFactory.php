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
            'type'  => Shop::TYPE_RESTAURANT,
            'logo'  => $this->faker->imageUrl(),
            'phone' => $this->faker->phoneNumber,

            'service_id'            => 1,
            'is_approved'           => rand(0, 1),
            'min_order_price'       => rand(20, 100) * 100,
            'average_ready_minutes' => rand(1, 3) > 1 ? rand(15, 45) : null,

            'domain'          => $this->faker->domainName,
            'primary_color'   => $this->faker->hexColor,
            'secondary_color' => $this->faker->hexColor,
            'facebook_url'    => null,
            'instagram_url'   => null,
            'twitter_url'     => null,
            'linkedin_url'    => null,

        ];
    }
}
