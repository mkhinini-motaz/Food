<?php

use App\Models\Product;

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

        $productItemCategory = factory(\App\Models\ProductItemCategory::class)->create([
            'name' => 'Riz',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/restaurant/productItemCategory/rice.jpg',
        ]);
        $productItemCategoryIds[] = $productItemCategory->id;

        $productItemCategory = factory(\App\Models\ProductItemCategory::class)->create([
            'name' => 'Salade',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/restaurant/productItemCategory/salad.jpg',
        ]);
        $productItemCategoryIds[] = $productItemCategory->id;

        $productItemCategory = factory(\App\Models\ProductItemCategory::class)->create([
            'name' => 'Pomme de terre',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/restaurant/productItemCategory/kartoffeln.jpg',
        ]);
        $productItemCategoryIds[] = $productItemCategory->id;

        $productItemCategory = factory(\App\Models\ProductItemCategory::class)->create([
            'name' => 'Sauce',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/restaurant/productItemCategory/sauce.jpg',
        ]);
        $productItemCategoryIds[] = $productItemCategory->id;

        $productEscalopePane = Product::where('name', 'Escalope pané')->first();
        $productEscalopePane->productItemCategories()->sync($productItemCategoryIds);

    }
}
