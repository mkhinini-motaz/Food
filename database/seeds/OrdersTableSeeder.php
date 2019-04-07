<?php

use Illuminate\Database\Seeder;
use App\Product;

class OrdersTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        factory(\App\Order::class, 500)->create();
    }
}
