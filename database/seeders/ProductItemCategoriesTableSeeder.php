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

        $productItemCategoryIdsForPlat = [ $productItemCategoryRice->id, $productItemCategorySalad->id, $productItemCategoryPotatoes->id ];
        $products = Product::where('category_id', '=', 1)->get();
        foreach ($products as $product) {
            $product->productItemCategories()->sync($productItemCategoryIdsForPlat);
            $product->productItemCategories()->attach(
                $productItemCategorySauce->id, [ 'max_items' => 3 ]
            );
        }

        $products = Product::where('category_id', '=', 2)->get();
        foreach ($products as $product) {
            $product->productItemCategories()->sync([
                $productItemCategorySalad->id => [ 'max_items' => 3, 'items_are_quantifiable' => 1 ],
                $productItemCategorySauce->id => [ 'max_items' => 3, 'items_are_quantifiable' => 1 ],
                $productItemCategoryPotatoes->id => [ 'max_items' => 1 ],
            ]);
        }
    }
}
