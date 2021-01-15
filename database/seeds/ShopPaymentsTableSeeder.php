<?php

use Illuminate\Database\Seeder;
use App\Product;

class ShopPaymentsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        factory(\App\Models\ShopPayment::class, 10)->create();
    }
}
