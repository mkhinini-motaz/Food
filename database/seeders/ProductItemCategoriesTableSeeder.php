<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductItemCategory;

use Illuminate\Database\Seeder;

class ProductItemCategoriesTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $productItemCategoryIds = [];

        $productItemCategoryRice = ProductItemCategory::factory()->create([
            'name' => [
                'fr' => 'Riz',
                'en' => 'Rice',
                'tn' => 'Roz',
                'ar' => 'أرز',
            ],
            'photo' => 'example/restaurant/productItemCategory/rice.jpg',
        ]);

        $productItemCategorySalad = ProductItemCategory::factory()->create([
            'name' => [
                'fr' => 'Salade',
                'en' => 'Salad',
                'tn' => 'Slata',
                'ar' => 'سلطة',
            ],
            'photo' => 'example/restaurant/productItemCategory/salad.jpg',
        ]);

        $productItemCategoryPotatoes = ProductItemCategory::factory()->create([
            'name' => [
                'fr' => 'Pomme de terre',
                'en' => 'Potato',
                'tn' => 'Batata',
                'ar' => 'بطاطس',
            ],
            'photo' => 'example/restaurant/productItemCategory/kartoffeln.jpg',
        ]);

        $productItemCategorySauce = ProductItemCategory::factory()->create([
            'name' => [
                'fr' => 'Sauce',
                'en' => 'Sauce',
                'tn' => 'Sauce',
                'ar' => 'صلصة',
            ],
            'photo' => 'example/restaurant/productItemCategory/sauce.jpg',
        ]);

        $productItemCategorySaucePizza = ProductItemCategory::factory()->create([
            'name' => [
                'fr' => 'Sauce pizza',
                'en' => 'Pizza Sauce',
                'tn' => 'Sauce pizza',
                'ar' => 'صلصة البيتزا',
            ],
            'photo' => 'example/restaurant/productItemCategory/sauce_pizza.jpg',
        ]);

        $productItemCategorySupplement = ProductItemCategory::factory()->create([
            'name' => [
                'fr' => 'Supplément',
                'en' => 'Supplement',
                'tn' => 'Supplément',
                'ar' => 'اضافات',
            ],
            'photo' => 'example/restaurant/productItemCategory/supplement.jpg',
        ]);

        $products = Product::where('category_id', '=', 1)->get();
        foreach ($products as $product) {
            $product->productItemCategories()->sync([
                $productItemCategoryRice->id     => [ 'order' => 1, ],
                $productItemCategorySalad->id    => [ 'order' => 2, ],
                $productItemCategoryPotatoes->id => [ 'order' => 3, ],
                $productItemCategorySauce->id    => [ 'order' => 4, 'max_items' => 3, ]
            ]);
        }

        $products = Product::where('category_id', '=', 2)->get();
        foreach ($products as $product) {
            $product->productItemCategories()->sync([
                $productItemCategorySauce->id      => [ 'order' => 1, 'min_items' => 0, 'max_items' => 3, 'items_are_quantifiable' => 1, ],
                $productItemCategorySalad->id      => [ 'order' => 2, 'min_items' => 0, 'max_items' => 3, 'items_are_quantifiable' => 1, ],
                $productItemCategoryPotatoes->id   => [ 'order' => 3, ],
//                $productItemCategorySupplement->id => [ 'order' => 4, 'min_items' => 0, 'max_items' => 4, 'items_are_billable' => 1, ],

            ]);
        }

        $quatreGoutPizzaProduct = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pizza au choix'")->first();
        $quatreGoutPizzaProduct->productItemCategories()->sync([
            $productItemCategorySaucePizza->id => [ 'order' => 1 ],
            $productItemCategorySupplement->id => [ 'order' => 2, 'min_items' => 2, 'max_items' => 4, ],
        ]);
    }
}
