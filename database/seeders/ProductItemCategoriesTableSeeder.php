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
        $description = 'Hello, i am a product item category. ';
        $productItemCategoryIds = [];

        $productItemCategory = ProductItemCategory::factory()->create([
            'name' => 'Riz',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/restaurant/productItemCategory/rice.jpg',
        ]);
        $productItemCategoryIds[] = $productItemCategory->id;

        $productItemCategory = ProductItemCategory::factory()->create([
            'name' => 'Salade',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/restaurant/productItemCategory/salad.jpg',
        ]);
        $productItemCategoryIds[] = $productItemCategory->id;

        $productItemCategory = ProductItemCategory::factory()->create([
            'name' => 'Pomme de terre',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/restaurant/productItemCategory/kartoffeln.jpg',
        ]);
        $productItemCategoryIds[] = $productItemCategory->id;

        $productItemCategory = ProductItemCategory::factory()->create([
            'name' => 'Sauce',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/restaurant/productItemCategory/sauce.jpg',
        ]);
        $productItemCategoryIds[] = $productItemCategory->id;

        // TODO: sync with all products of type plat
        $productEscalopePane = Product::where('name', 'Escalope pané')->first();
        $productEscalopePane->productItemCategories()->sync($productItemCategoryIds);

    }
}
