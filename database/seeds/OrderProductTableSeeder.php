<?php

use Illuminate\Database\Seeder;
use App\Product;

class OrderProductTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $orderProductTableEntries = factory(\App\OrderProduct::class, 1000)->create();
    }
}
