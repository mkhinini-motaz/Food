<?php

use Illuminate\Database\Seeder;
use App\Product;

class CategoriesTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $description = 'Hello, i am a category. ';

        factory(\App\Models\Category::class)->create([
            'name' => 'Plats',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/restaurant/category/repas_luxe.jpg',
        ]);

        if (env('APP_ENV') === 'local') {
            factory(\App\Models\Category::class)->create([
                'name' => 'Test pagination category',
                'description' => str_repeat($description, rand(1, 6)),
                'photo' => '',
            ]);
        }
    }
}
