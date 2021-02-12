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

        $productItemCategory = ProductItemCategory::factory()->create([
            'name' => [
                'fr' => 'Riz',
                'en' => 'Rice',
                'tn' => 'Roz',
                'ar' => 'أرز',
            ],
            'photo' => 'example/restaurant/productItemCategory/rice.jpg',
        ]);
        $productItemCategoryIds[] = $productItemCategory->id;

        $productItemCategory = ProductItemCategory::factory()->create([
            'name' => [
                'fr' => 'Salade',
                'en' => 'Salad',
                'tn' => 'Slata',
                'ar' => 'سلطة',
            ],
            'photo' => 'example/restaurant/productItemCategory/salad.jpg',
        ]);
        $productItemCategoryIds[] = $productItemCategory->id;

        $productItemCategory = ProductItemCategory::factory()->create([
            'name' => [
                'fr' => 'Pomme de terre',
                'en' => 'Potato',
                'tn' => 'Batata',
                'ar' => 'بطاطس',
            ],
            'photo' => 'example/restaurant/productItemCategory/kartoffeln.jpg',
        ]);
        $productItemCategoryIds[] = $productItemCategory->id;

        $productItemCategory = ProductItemCategory::factory()->create([
            'name' => [
                'fr' => 'Sauce',
                'en' => 'Sauce',
                'tn' => 'Sauce',
                'ar' => 'صلصة',
            ],
            'photo' => 'example/restaurant/productItemCategory/sauce.jpg',
        ]);

        // TODO: sync with all products of type plat
        $products = Product::where('category_id', '=', 1)->get();
        foreach ($products as $product) {
            $product->productItemCategories()->sync($productItemCategoryIds);
            $product->productItemCategories()->attach(
                $productItemCategory->id, [ 'max_items' => 3 ]
            );
        }

    }
}
