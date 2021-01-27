<?php

namespace Database\Seeders;

use App\Models\ProductItem;
use App\Models\ProductItemCategory;

use Illuminate\Database\Seeder;

class ProductItemsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $productItemCategoryRiceId    = ProductItemCategory::where('name', '=', 'Riz')->first()->id;
        $productItemCategorySaladId   = ProductItemCategory::where('name', '=', 'Salade')->first()->id;
        $productItemCategorySauceId   = ProductItemCategory::where('name', '=', 'Sauce')->first()->id;
        $productItemCategoryPotatosId = ProductItemCategory::where('name', '=', 'Pomme de terre')->first()->id;

        ProductItem::factory()->create([
            'name' => 'Frites',
            'photo' => 'example/restaurant/productItem/frites.jpg',
            'product_item_category_id' => $productItemCategoryPotatosId,
            'price' => 1000,
        ]);

        ProductItem::factory()->create([
            'name' => 'Potatos',
            'photo' => 'example/restaurant/productItem/potatos.jpg',
            'product_item_category_id' => $productItemCategoryPotatosId,
            'price' => 1200,
        ]);

        ProductItem::factory()->create([
            'name' => 'Frites zigzag',
            'photo' => 'example/restaurant/productItem/curly_frites.jpg',
            'product_item_category_id' => $productItemCategoryPotatosId,
            'price' => 1000,
        ]);

        ProductItem::factory()->create([
            'name' => 'Riz jerbi',
            'photo' => 'example/restaurant/productItem/roz_jerbi.jpg',
            'product_item_category_id' => $productItemCategoryRiceId,
            'price' => 1300,
        ]);

        ProductItem::factory()->create([
            'name' => 'Riz jaune',
            'photo' => 'example/restaurant/productItem/yellow_rice.jpg',
            'product_item_category_id' => $productItemCategoryRiceId,
            'price' => 1300,
        ]);

        ProductItem::factory()->create([
            'name' => 'Riz à l\'ail',
            'photo' => 'example/restaurant/productItem/rice_garlic_persley.jpg',
            'product_item_category_id' => $productItemCategoryRiceId,
            'price' => 1600,
        ]);

        ProductItem::factory()->create([
            'name' => 'Riz fruits sec',
            'photo' => 'example/restaurant/productItem/rice_kajo.jpg',
            'product_item_category_id' => $productItemCategoryRiceId,
            'price' => 2000,
        ]);

        ProductItem::factory()->create([
            'name' => 'Salade concombre',
            'photo' => 'example/restaurant/productItem/salad_concumber.jpg',
            'product_item_category_id' => $productItemCategorySaladId,
            'price' => 1200,
        ]);

        ProductItem::factory()->create([
            'name' => 'Salade choux rouge',
            'photo' => 'example/restaurant/productItem/salad_kronb.jpg',
            'product_item_category_id' => $productItemCategorySaladId,
            'price' => 1200,
        ]);

        ProductItem::factory()->create([
            'name' => 'Salade fruit de mer',
            'photo' => 'example/restaurant/productItem/salade_fruit_de_mer.jpg',
            'product_item_category_id' => $productItemCategorySaladId,
            'price' => 2500,
        ]);

        ProductItem::factory()->create([
            'name' => 'Salade carotte',
            'photo' => 'example/restaurant/productItem/salad_carrot.jpg',
            'product_item_category_id' => $productItemCategorySaladId,
            'price' => 1200,
        ]);

        ProductItem::factory()->create([
            'name' => 'Salade betterave',
            'photo' => 'example/restaurant/productItem/salad_beet.jpg',
            'product_item_category_id' => $productItemCategorySaladId,
            'price' => 1800,
        ]);

        ProductItem::factory()->create([
            'name' => 'Mayonaise',
            'photo' => 'example/restaurant/productItem/mayonaise.jpg',
            'product_item_category_id' => $productItemCategorySauceId,
            'price' => 0,
        ]);

        ProductItem::factory()->create([
            'name' => 'Sauce algerienne',
            'photo' => 'example/restaurant/productItem/algerienne.jpg',
            'product_item_category_id' => $productItemCategorySauceId,
            'price' => 0,
        ]);

        ProductItem::factory()->create([
            'name' => 'Ketchup',
            'photo' => 'example/restaurant/productItem/ketchup.jpg',
            'product_item_category_id' => $productItemCategorySauceId,
            'price' => 0,
        ]);

        ProductItem::factory()->create([
            'name' => 'Sauce barbecue',
            'photo' => 'example/restaurant/productItem/barbecue_sauce.jpg',
            'product_item_category_id' => $productItemCategorySauceId,
            'price' => 0,
        ]);
    }
}
