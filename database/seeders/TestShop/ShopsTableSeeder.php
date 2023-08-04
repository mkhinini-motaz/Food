<?php

namespace Database\Seeders\TestShop;

use App\Models\Service;
use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $serviceId = Service::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Test'")->first()->id;
        Shop::factory()->create([
            'name' => 'Test shop',
            'domain' => 'testshop.com',
            'service_id' => $serviceId,
            'logo' => 'example/restaurant/logo/ghostchef.svg',
            'is_approved' => 1,
            'min_order_price' => 3000,
            'latitude'  => 35.731744,
            'longitude' => 10.579082,

            'working_hours' => [
                0 => [ 'start' => '00:00', 'end' => '23:59' ],
                1 => [ 'start' => '00:00', 'end' => '23:59' ],
                2 => [ 'start' => '00:00', 'end' => '23:59' ],
                3 => [ 'start' => '00:00', 'end' => '23:59' ],
                4 => [ 'start' => '00:00', 'end' => '23:59' ],
                5 => [ 'start' => '00:00', 'end' => '23:59' ],
                6 => [ 'start' => '00:00', 'end' => '23:59' ],
            ],
        ]);
    }
}
