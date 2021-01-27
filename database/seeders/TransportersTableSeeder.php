<?php

namespace Database\Seeders;

use App\Models\Transporter;

use Illuminate\Database\Seeder;

class TransportersTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        Transporter::factory()->count(10)->create();
    }
}
