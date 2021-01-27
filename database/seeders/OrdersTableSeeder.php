<?php

namespace Database\Seeders;

use App\Models\Order;

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        Order::factory()->count(100)->create();
    }
}
