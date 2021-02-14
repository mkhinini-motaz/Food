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
            'logo' => 'example/restaurant/logo/ghostchef.svg',
            'is_approved' => true,
            'min_order_price' => 3000,
        ]);

        Shop::factory()->create([ 'is_approved' => false ]);
    }
}
