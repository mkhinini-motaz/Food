<?php

namespace Database\Seeders;

use App\Models\Location;

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        Location::factory()->count(10)->create();
    }
}
