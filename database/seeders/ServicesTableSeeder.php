<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::factory()->create([
            'name' => [
                'fr'   => 'Ghostchef',
                'en'   => 'Ghostchef',
                'tnfr' => 'Ghostchef',
                'tnar' => 'Ghostchef',
                'ar'   => 'Ghostchef',
            ],
            'photo' => 'example/service/food.jpg',
        ]);

        Service::factory()->create([
            'name' => [
                'fr'   => 'GhostMarket',
                'en'   => 'GhostMarket',
                'tnfr' => 'GhostMarket',
                'tnar' => 'GhostMarket',
                'ar'   => 'GhostMarket',
            ],
            'photo' => 'example/service/grocery.jpg',
        ]);
    }
}
