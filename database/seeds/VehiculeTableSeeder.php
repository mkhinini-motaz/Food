<?php

use Illuminate\Database\Seeder;
use App\Product;

class VehiculesTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        factory(\App\Model\Vehicule::class, 10)->create();
    }
}
