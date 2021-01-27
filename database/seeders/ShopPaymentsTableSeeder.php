<?php

namespace Database\Seeders;

use App\Models\ShopPayment;

use Illuminate\Database\Seeder;

class ShopPaymentsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        ShopPayment::factory()->count(10)->create();
    }
}
