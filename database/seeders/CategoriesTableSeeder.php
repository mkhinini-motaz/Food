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
        $order = 1;

        Category::factory()->create([
            'name' => [
                'fr'   => 'Plats',
                'en'   => 'Dishes',
                'tnfr' => 'Plats',
                'tnar' => 'أطباق',
                'ar'   => 'أطباق',
            ],
            'photo' => 'example/restaurant/category/repas_luxe.jpg',
            'is_visible' => 0,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Box',
                'en'   => 'Box',
                'tnfr' => 'Box',
                'tnar' => 'بوكس',
                'ar'   => 'بوكس',
            ],
            'description' => [
                'fr'   => 'Découvrez notre specialité, les box personalisés',
                'en'   => 'Discover our specialty, customized boxes',
                'tnfr' => 'Ektachef specialité mta3na, les box perso',
                'tnar' => 'إكتشف اختصاصنا، بوكس برسو',
                'ar'   => 'إكتشف اختصاصنا، بوكس برسو',
            ],
            'photo' => 'example/restaurant/category/boxes.jpg',
            'is_visible' => 1,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Tacos',
                'en'   => 'French tacos',
                'tnfr' => 'Tacos',
                'tnar' => 'تاكوس',
                'ar'   => 'تاكوس',
            ],
            'description' => [
                'fr'   => 'Dégustez notre délicieux tacos avec notre pate originale',
                'en'   => 'Enjoy our delicious french tacos with our original pastry',
                'tnfr' => 'Tmata3 bi tacos bnin bil pate originale mta3na',
                'tnar' => 'تمتع بتاكوس البنين بالعجينة الاوريجينال متاعنا',
                'ar'   => 'استمتع بتاكوس اللذيذ بعجينتنا الأصلية',
            ],
            'photo' => 'example/restaurant/category/tacos.jpg',
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Sandwich',
                'en'   => 'Sandwich',
                'tnfr' => 'Sandwich',
                'tnar' => 'سندويتش',
                'ar'   => 'ساندويتش',
            ],
            'description' => [
                'fr'   => 'Des ingrédients frais dans un délicieux léger pain',
                'en'   => 'Fresh ingredients in a delicious light bread',
                'tnfr' => 'Des ingrédients frechk fi 5obz bnin w 5fif',
                'tnar' => 'مكونات فرشكة في خبز بنين و خفيف',
                'ar'   => 'مكونات طازجة في خبز لذيذ و خفيف',
            ],
            'photo' => 'example/restaurant/category/sandwich.jpg',
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Makloub',
                'en'   => 'Makloub',
                'tnfr' => 'Ma9loub',
                'tnar' => 'مقلوب',
                'ar'   => 'مقلوب',
            ],
            'description' => [
                'fr'   => 'Un makloub pas comme les autres',
                'en'   => 'A makloub like no other',
                'tnfr' => 'Makloub mouch kima lo5rin',
                'tnar' => 'مقلوب موش كيما لخرين',
                'ar'   => 'مقلوب لا مثيل له',
            ],
            'photo' => 'example/restaurant/category/ma9loub.jpg',
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Pizza',
                'en'   => 'Pizza',
                'tnfr' => 'Pizza',
                'tnar' => 'بيتزا',
                'ar'   => 'بيتزا',
            ],
            'description' => [
                'fr'   => 'La vrai pate napolitaine avec du fromage de qualité',
                'en'   => 'The real Neapolitan pastry with quality cheese',
                'tnfr' => 'Pate napolitaine s7i7a ma3 fromage de qualtié',
                'tnar' => 'بات نابوليتان صحيحة مع فورماج كاليتاي',
                'ar'   => 'عجينة نابولي الأصلية مع جبنة عالية الجودة',
            ],
            'photo' => 'example/restaurant/category/pizza.jpg',
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Pizza sauce blanche',
                'en'   => 'White sauce pizza',
                'tnfr' => 'Pizza sauce blanche',
                'tnar' => 'بيتزا سوس بلانش',
                'ar'   => 'بيتزا الصلصة البيضاء',
            ],
            'description' => [
                'fr'   => 'La vrai pate napolitaine avec du fromage de qualité',
                'en'   => 'The real Neapolitan pastry with quality cheese',
                'tnfr' => 'Pate napolitaine s7i7a ma3 fromage de qualtié',
                'tnar' => 'بات نابوليتان صحيحة مع فورماج كاليتاي',
                'ar'   => 'عجينة نابولي الأصلية مع جبنة عالية الجودة',
            ],
            'photo' => 'example/restaurant/category/pizza_sauce_blanche.jpg',
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Baguette farcie',
                'en'   => 'Stuffed baguette',
                'tnfr' => 'Baguette farcie',
                'tnar' => 'باغيت فارسي',
                'ar'   => 'باغيت محشي',
            ],
            'description' => [
                'fr'   => 'La vrai pate napolitaine avec du fromage de qualité',
                'en'   => 'The real Neapolitan pastry with quality cheese',
                'tnfr' => 'Pate napolitaine s7i7a ma3 fromage de qualtié',
                'tnar' => 'بات نابوليتان صحيحة مع فورماج كاليتاي',
                'ar'   => 'عجينة نابولي الأصلية مع جبنة عالية الجودة',
            ],
            'photo' => 'example/restaurant/category/baguette_farcie.jpg',
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Pâtes',
                'en'   => 'Pasta',
                'tnfr' => 'Ma9arouna',
                'tnar' => 'مقرونة',
                'ar'   => 'معكرونة',
            ],
            'photo' => 'example/restaurant/category/pates.jpg',
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Entrées',
                'en'   => 'Appetizers',
                'tnfr' => 'Entrées',
                'tnar' => 'وجبات خفيفة',
                'ar'   => 'وجبات خفيفة',
            ],
            'photo' => 'example/restaurant/category/entree.jpg',
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Boissons',
                'en'   => 'Drinks',
                'tnfr' => 'Boissons',
                'tnar' => 'مشروبات',
                'ar'   => 'مشروبات',
            ],
            'photo' => 'example/restaurant/category/boisson.jpg',
            'order' => $order++,
        ]);

/*
        if (env('APP_ENV') === 'local') {
            Category::factory()->create([
                'name' => [
                    'fr'   => 'FR_Test_pagination_category',
                    'en'   => 'EN_Test_pagination_category',
                    'tnfr' => 'TNFR_Test_pagination_category',
                    'tnar' => 'TNAR_Test_pagination_category',
                    'ar'   => 'AR_Test_pagination_category',
                    ],
                'photo' => '',
                'order' => $order++,
            ]);
        }
*/
    }
}
