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
        factory(\App\Model\Order::class, 100)->create();
    }
}
