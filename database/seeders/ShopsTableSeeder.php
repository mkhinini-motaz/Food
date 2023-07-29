<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        Shop::factory()->create([
            'name' => 'ghostchef',
            'domain' => 'ghostchef.shop',
            'service_id' => 1,
            'logo' => 'example/restaurant/logo/ghostchef.svg',
            'is_approved' => 1,
            'min_order_price' => 3000,

            'working_hours' => [
                0 => [ ],
                1 => [ 'start' => '11:30', 'end' => '22:00' ],
                2 => [ 'start' => '11:30', 'end' => '22:00' ],
                3 => [ 'start' => '11:30', 'end' => '22:00' ],
                4 => [ 'start' => '11:30', 'end' => '22:00' ],
                5 => [ 'start' => '11:30', 'end' => '22:00' ],
                6 => [ 'start' => '11:30', 'end' => '22:00' ],
            ],
        ]);
    }
}
