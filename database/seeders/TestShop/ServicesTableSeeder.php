<?php

namespace Database\Seeders\TestShop;

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
                'fr'   => 'Test',
                'en'   => 'Test',
                'tnfr' => 'Test',
                'tnar' => 'تست',
                'ar'   => 'تست',
            ],
            'photo' => 'example/service/food.jpg',
            'service_area_id' => 1,
        ]);

    }
}
