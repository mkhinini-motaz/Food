<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class ProductsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $categoryPlatsId          = Category::where('name', '=', 'Plats')->first()->id;
        $testPaginationCategoryId = Category::where('name', '=', 'Test pagination category')->first()->id;

        factory(\App\Models\Product::class)->create([
            'name' => 'Escalope pané',
            'photo' => 'example/restaurant/product/escalope_pane.jpg',
            'category_id' => $categoryPlatsId,
            'price' => 600,
        ]);

        if (env('APP_ENV') === 'local') {
            factory(\App\Models\Product::class, 500)->create([ 'category_id' => $testPaginationCategoryId ]);
        }
    }
}
