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
                'fr'   => 'Restaurant',
                'en'   => 'Restaurant',
                'tnfr' => 'Restaurant',
                'tnar' => 'رستورون',
                'ar'   => 'مطعم',
            ],
            'photo' => 'example/service/food.jpg',
            'service_area_id' => 1,
        ]);

        Service::factory()->create([
            'name' => [
                'fr'   => 'Chahia',
                'en'   => 'Chahia',
                'tnfr' => 'Chahia',
                'tnar' => 'شهية',
                'ar'   => 'شهية',
            ],
            'photo' => 'example/service/chahia.png',
            'service_area_id' => 1,
        ]);

        Service::factory()->create([
            'name' => [
                'fr'   => 'Épicerie',
                'en'   => 'Supermarket',
                'tnfr' => 'Superet',
                'tnar' => 'سوبرات',
                'ar'   => 'سوبر ماركت',
            ],
            'photo' => 'example/service/grocery.jpg',
            'service_area_id' => 1,
        ]);

        Service::factory()->create([
            'name' => [
                'fr'   => 'Boucherie Mosbah',
                'en'   => 'Mosbah butcher shop',
                'tnfr' => 'Boucherie Mosbah',
                'tnar' => 'مجزرة مصباح',
                'ar'   => 'مجزرة مصباح',
            ],
            'photo' => 'example/service/fresh.jpg',
            'service_area_id' => 1,
        ]);

        Service::factory()->create([
            'name' => [
                'fr'   => 'Fruits et légumes Brahem',
                'en'   => 'Brahem fruits and vegetables',
                'tnfr' => 'Fruits et légumes Brahem',
                'tnar' => 'خضر و غلال براهم',
                'ar'   => 'خضر و غلال براهم',
            ],
            'photo' => 'example/service/fresh.jpg',
            'service_area_id' => 1,
        ]);
    }
}
