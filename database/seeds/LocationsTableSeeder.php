<?php

use Illuminate\Database\Seeder;
use App\Product;

class LocationsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        factory(\App\Model\Location::class, 10)->create();
    }
}