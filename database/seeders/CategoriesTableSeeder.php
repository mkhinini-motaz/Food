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
        Category::factory()->create([
            'name' => [ 'fr' => 'Plats', 'en' => 'Dishes', 'tn' => 'Plats', 'ar' => 'أطباق', ],
            'photo' => 'example/restaurant/category/repas_luxe.jpg',
            'is_visible' => 0,
            'order' => 1,
        ]);

        Category::factory()->create([
            'name' => [ 'fr' => 'Sandwich', 'en' => 'Sandwich', 'tn' => 'Sandwich', 'ar' => 'ساندويتش', ],
            'photo' => 'example/restaurant/category/sandwich.jpg',
            'order' => 2,
        ]);

        Category::factory()->create([
            'name' => [ 'fr' => 'Makloub', 'en' => 'Makloub', 'tn' => 'Ma9loub', 'ar' => 'مقلوب', ],
            'photo' => 'example/restaurant/category/ma9loub.jpg',
            'order' => 3,
        ]);

        Category::factory()->create([
            'name' => [ 'fr' => 'Pizza', 'en' => 'Pizza', 'tn' => 'Pizza', 'ar' => 'بيتزا', ],
            'photo' => 'example/restaurant/category/pizza.jpg',
            'order' => 4,
        ]);

        Category::factory()->create([
            'name' => [ 'fr' => 'Pizza sauce blanche', 'en' => 'White sauce pizza', 'tn' => 'Pizza sauce blanche', 'ar' => 'بيتزا الصلصة البيضاء', ],
            'photo' => 'example/restaurant/category/pizza_sauce_blanche.jpg',
            'order' => 5,
        ]);

        Category::factory()->create([
            'name' => [ 'fr' => 'Baguette farcie', 'en' => 'Stuffed baguette', 'tn' => 'Baguette farcie', 'ar' => 'باغيت محشي', ],
            'photo' => 'example/restaurant/category/baguette_farcie.jpg',
            'order' => 6,
        ]);

        Category::factory()->create([
            'name' => [ 'fr' => 'Pâtes', 'en' => 'Pasta', 'tn' => 'Ma9arouna', 'ar' => 'معكرونة', ],
            'photo' => 'example/restaurant/category/pates.jpg',
            'order' => 7,
        ]);

        Category::factory()->create([
            'name' => [ 'fr' => 'Entrées', 'en' => 'Appetizers', 'tn' => 'Entrées', 'ar' => 'وجبات خفيفة', ],
            'photo' => 'example/restaurant/category/entree.jpg',
            'order' => 8,
        ]);

        Category::factory()->create([
            'name' => [ 'fr' => 'Boissons', 'en' => 'Drinks', 'tn' => 'Boissons', 'ar' => 'مشروبات', ],
            'photo' => 'example/restaurant/category/boisson.jpg',
            'order' => 9,
        ]);

        if (env('APP_ENV') === 'local') {
            Category::factory()->create([
                'name' => [ 'fr' => 'FR_Test_pagination_category', 'en' => 'EN_Test_pagination_category', 'tn' => 'TN_Test_pagination_category', 'ar' => 'AR_Test_pagination_category', ],
                'photo' => '',
                'order' => 10,
            ]);
        }
    }
}
