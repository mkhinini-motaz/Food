<?php

use Illuminate\Database\Seeder;
use App\Product;

class TransporterPaymentsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        factory(\App\Models\TransporterPayment::class, 10)->create();
    }
}
