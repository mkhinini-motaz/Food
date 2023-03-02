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
        $location = Location::factory()->create([
            'name'      => 'Ghostchef 1',
            'shop_id'   => 1,
            'latitude'  => 35.731744,
            'longitude' => 10.579082,
        ]);
    }
}
