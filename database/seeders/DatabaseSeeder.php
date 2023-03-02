<?php

namespace Database\Seeders;

use Database\Seeders\Shop\BoucherieMosbahSeeder;
use Database\Seeders\Shop\FruitsLegumesSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ServicesTableSeeder::class);

        $this->call(GhostChefDatabaseSeeder::class);
        $this->call(BoucherieMosbahSeeder::class);
        $this->call(FruitsLegumesSeeder::class);
//        $this->call(GhostMarketDatabaseSeeder::class);
    }
}
