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
        ]);

        Service::factory()->create([
            'name' => [
                'fr'   => 'Produits frais',
                'en'   => 'Fresh products',
                'tnfr' => 'Produits frais',
                'tnar' => 'برودوي فراي',
                'ar'   => 'منتجات طازجة',
            ],
            'photo' => 'example/service/grocery.jpg',
        ]);
    }
}
