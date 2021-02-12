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
            'name' => [
                'fr' => 'Plats',
                'en' => 'Dishes',
                'tn' => 'Plats',
                'ar' => 'أطباق',
            ],
            'description' => [
                'fr' => 'Français Français Français Français',
                'en' => 'English English English English',
                'tn' => 'Tounsi Tounsi Tounsi Tounsi Tounsi',
                'ar' => 'عربي عربي عربي عربي',
            ],
            'photo' => 'example/restaurant/category/repas_luxe.jpg',
        ]);

        Category::factory()->create([
            'name' => [
                'fr' => 'Sandwich',
                'en' => 'Sandwich',
                'tn' => 'Sandwich',
                'ar' => 'ساندويتش',
            ],
            'description' => [
                'fr' => 'Français Français Français Français',
                'en' => 'English English English English',
                'tn' => 'Tounsi Tounsi Tounsi Tounsi Tounsi',
                'ar' => 'عربي عربي عربي عربي',
            ],
            'photo' => 'example/restaurant/category/sandwich.jpg',
        ]);

        Category::factory()->create([
            'name' => [
                'fr' => 'Pizza',
                'en' => 'Pizza',
                'tn' => 'Pizza',
                'ar' => 'بيتزا',
            ],
            'description' => [
                'fr' => 'Français Français Français Français',
                'en' => 'English English English English',
                'tn' => 'Tounsi Tounsi Tounsi Tounsi Tounsi',
                'ar' => 'عربي عربي عربي عربي',
            ],
            'photo' => 'example/restaurant/category/pizza.jpg',
        ]);

        Category::factory()->create([
            'name' => [
                'fr' => 'Pâtes',
                'en' => 'Pasta',
                'tn' => 'Ma9arouna',
                'ar' => 'معكرونة',
            ],
            'description' => [
                'fr' => 'Français Français Français Français',
                'en' => 'English English English English',
                'tn' => 'Tounsi Tounsi Tounsi Tounsi Tounsi',
                'ar' => 'عربي عربي عربي عربي',
            ],
            'photo' => 'example/restaurant/category/pates.jpg',
        ]);

        Category::factory()->create([
            'name' => [
                'fr' => 'Entrées',
                'en' => 'Appetizers',
                'tn' => 'Entrées',
                'ar' => 'وجبات خفيفة',
            ],
            'description' => [
                'fr' => 'Français Français Français Français',
                'en' => 'English English English English',
                'tn' => 'Tounsi Tounsi Tounsi Tounsi Tounsi',
                'ar' => 'عربي عربي عربي عربي',
            ],
            'photo' => 'example/restaurant/category/entree.jpg',
        ]);

        Category::factory()->create([
            'name' => [
                'fr' => 'Boissons',
                'en' => 'Drinks',
                'tn' => 'Boissons',
                'ar' => 'مشروبات',
            ],
            'description' => [
                'fr' => 'Français Français Français Français',
                'en' => 'English English English English',
                'tn' => 'Tounsi Tounsi Tounsi Tounsi Tounsi',
                'ar' => 'عربي عربي عربي عربي',
            ],
            'photo' => 'example/restaurant/category/boisson.jpg',
        ]);

        if (env('APP_ENV') === 'local') {
            Category::factory()->create([
                'name' => [
                    'fr' => 'Test_pagination_category',
                    'en' => 'Test_pagination_category',
                    'tn' => 'Test_pagination_category',
                    'ar' => 'Test_pagination_category',
                ],
                'description' => [
                    'fr' => 'Français Français Français Français',
                    'en' => 'English English English English',
                    'tn' => 'Tounsi Tounsi Tounsi Tounsi Tounsi',
                    'ar' => 'عربي عربي عربي عربي',
                ],
                'photo' => '',
            ]);
        }
    }
}
