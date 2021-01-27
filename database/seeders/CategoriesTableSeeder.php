<?php

namespace Database\Seeders;

use App\Models\Category;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $description = 'Hello, i am a category. ';

        Category::factory()->create([
            'name' => 'Plats',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/restaurant/category/repas_luxe.jpg',
        ]);

        Category::factory()->create([
            'name' => 'Sandwich',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/restaurant/category/sandwich.jpg',
        ]);

        Category::factory()->create([
            'name' => 'Pizza',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/restaurant/category/pizza.jpg',
        ]);

        Category::factory()->create([
            'name' => 'Pâtes',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/restaurant/category/pates.jpg',
        ]);

        Category::factory()->create([
            'name' => 'Apéretif',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/restaurant/category/aperetif.jpg',
        ]);

        if (env('APP_ENV') === 'local') {
            Category::factory()->create([
                'name' => 'Test pagination category',
                'description' => str_repeat($description, rand(1, 6)),
                'photo' => '',
            ]);
        }
    }
}
