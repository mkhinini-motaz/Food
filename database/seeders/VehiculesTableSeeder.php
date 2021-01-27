<?php

namespace Database\Seeders;

use App\Models\Vehicule;

use Illuminate\Database\Seeder;

class VehiculesTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        Vehicule::factory()->count(10)->create();
    }
}
