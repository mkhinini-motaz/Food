<?php

namespace Database\Seeders;

use App\Models\TransporterPayment;
use Illuminate\Database\Seeder;

class TransporterPaymentsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        TransporterPayment::factory()->count(10)->create();
    }
}
