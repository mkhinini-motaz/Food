<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Option;
use App\Models\Product;

use Illuminate\Database\Seeder;

class ProductsTableSeederV2 extends Seeder
{
    /**
     *
     */
    public function run()
    {
        $optionVH = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Viande hachée'")->first();
        $optionVH->photo = 'example/restaurant/option/viandehache.jpg';
        $optionVH->save();

        $optionV = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Viande de boeuf'")->first();
        $optionV->photo = 'example/restaurant/option/viande.jpg';
        $optionV->save();

        $portionFrites = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Portion frites'")->first();
        $portionFrites->order = 3;
        $portionFrites->save();

        $entreeId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Entrées'")->first()->id;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Escalope pané',
                'en'   => 'Breaded escalope',
                'tnfr' => 'Escalope pané',
                'tnar' => 'اسكالوب باني',
                'ar'   => 'اسكالوب مخبوز',
            ],
            'photo' => 'example/restaurant/product/escpane.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => 2,
            'added_loyalty_points' => 0,
            'price' => 2500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => '4 fromages',
                'en'   => '4 cheese',
                'tnfr' => '4 fromages',
                'tnar' => '4 فرماج',
                'ar'   => '4 أجبان',
            ],
            'photo' => 'example/restaurant/option/4fromages.png',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => 4,
            'added_loyalty_points' => 0,
            'price' => 3000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Bacon de boeuf',
                'en'   => 'Beef bacon',
                'tnfr' => 'Bacon de boeuf',
                'tnar' => 'بايكون بقري',
                'ar'   => 'بايكون بقر',
            ],
            'photo' => 'example/restaurant/option/bacon.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => 5,
            'added_loyalty_points' => 0,
            'price' => 3000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Bacon de dinde',
                'en'   => 'Turkey bacon',
                'tnfr' => 'Bacon dinde',
                'tnar' => 'بايكون دندون',
                'ar'   => 'بايكون الديك الرومي',
            ],
            'photo' => 'example/restaurant/option/bacondinde.png',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => 6,
            'added_loyalty_points' => 0,
            'price' => 2500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Peperoni',
                'en'   => 'Peperoni',
                'tnfr' => 'Peperoni',
                'tnar' => 'بيبروني',
                'ar'   => 'بيبروني',
            ],
            'photo' => 'example/restaurant/option/peperoni.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => 7,
            'added_loyalty_points' => 0,
            'price' => 2500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Cheddar',
                'en'   => 'Cheddar',
                'tnfr' => 'Cheddar',
                'tnar' => 'شيدر',
                'ar'   => 'شيدر',
            ],
            'photo' => 'example/restaurant/option/chedar.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => 8,
            'added_loyalty_points' => 0,
            'price' => 2000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Mozzarella',
                'en'   => 'Mozzarella',
                'tnfr' => 'Mozzarella',
                'tnar' => 'موزاريلا',
                'ar'   => 'موزاريلا',
            ],
            'photo' => 'example/restaurant/option/mozzarella.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => 9,
            'added_loyalty_points' => 0,
            'price' => 2000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Champignon',
                'en'   => 'Mushroom',
                'tnfr' => 'Champignon',
                'tnar' => 'فطر',
                'ar'   => 'فطر',
            ],
            'photo' => 'example/restaurant/product/champignon.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => 10,
            'added_loyalty_points' => 0,
            'price' => 2000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Jambon',
                'en'   => 'Ham',
                'tnfr' => 'Jambon',
                'tnar' => 'جمبون',
                'ar'   => 'جمبون',
            ],
            'photo' => 'example/restaurant/option/jambon_dinde.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => 11,
            'added_loyalty_points' => 0,
            'price' => 1500,
        ]);
    }

}
