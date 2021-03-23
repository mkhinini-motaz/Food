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
        $location = Location::factory()->create([ 'shop_id' => 1 ]);
    }
}
