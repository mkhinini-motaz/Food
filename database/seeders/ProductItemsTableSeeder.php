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
        $this->productItemsForRice();
        $this->productItemsForSalad();
        $this->productItemsForPotatos();
        $this->productItemsForSauce();
        $this->productItemsForSaucePizza();
        $this->productItemsForSupplement();
    }

    /**
     *
     */
    public function productItemsForRice()
    {
        $productItemCategoryRiceId = ProductItemCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Riz'")->first()->id;

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Riz jaune',
                'en' => 'Yellow rice',
                'tn' => 'Roz asfar',
                'ar' => 'ارز أصفر',
            ],
            'photo' => 'example/restaurant/productItem/yellow_rice.jpg',
            'product_item_category_id' => $productItemCategoryRiceId,
            'price' => 1300,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Riz à l\'ail',
                'en' => 'Garlic rice',
                'tn' => 'Roz 3al thom',
                'ar' => 'أرز بالثوم',
            ],
            'photo' => 'example/restaurant/productItem/rice_garlic_persley.jpg',
            'product_item_category_id' => $productItemCategoryRiceId,
            'price' => 1600,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Riz fruits sec',
                'en' => 'Dry fruits rice',
                'tn' => 'Roz fruits sec',
                'ar' => 'أرز فواكه جافة',
            ],
            'photo' => 'example/restaurant/productItem/rice_kajo.jpg',
            'product_item_category_id' => $productItemCategoryRiceId,
            'price' => 2000,
        ]);
    }

    /**
     *
     */
    public function productItemsForSalad()
    {
        $productItemCategorySaladId = ProductItemCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Salade'")->first()->id;

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Salade concombre',
                'en' => 'Cucumber salad',
                'tn' => 'Slatet fa9ous',
                'ar' => 'سلطة خيار',
            ],
            'photo' => 'example/restaurant/productItem/salad_concumber.jpg',
            'product_item_category_id' => $productItemCategorySaladId,
            'price' => 1200,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Salade choux rouge',
                'en' => 'Red cabbage salad',
                'tn' => 'Salatet cromb a7mar',
                'ar' => 'سلطة ملفوف أحمر',
            ],
            'photo' => 'example/restaurant/productItem/salad_kronb.jpg',
            'product_item_category_id' => $productItemCategorySaladId,
            'price' => 1200,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Salade fruits de mer',
                'en' => 'Seafood salad',
                'tn' => 'Slatet fruits de mer',
                'ar' => 'سلطة المأكولات البحرية',
            ],
            'photo' => 'example/restaurant/productItem/salade_fruit_de_mer.jpg',
            'product_item_category_id' => $productItemCategorySaladId,
            'price' => 2500,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Salade carotte',
                'en' => 'Carrot salad',
                'tn' => 'Slatet sfennaria',
                'ar' => 'سلطة الجزر',
            ],
            'photo' => 'example/restaurant/productItem/salad_carrot.jpg',
            'product_item_category_id' => $productItemCategorySaladId,
            'price' => 1200,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Salade betterave',
                'en' => 'Beet salad',
                'tn' => 'Slatet bettrave',
                'ar' => 'سلطة البنجر',
            ],
            'photo' => 'example/restaurant/productItem/salad_beet.jpg',
            'product_item_category_id' => $productItemCategorySaladId,
            'price' => 1800,
        ]);
    }

    /**
     *
     */
    public function productItemsForPotatos()
    {
        $productItemCategoryPotatosId = ProductItemCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pomme de terre'")->first()->id;

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Frites',
                'en' => 'French fries',
                'tn' => 'Frites',
                'ar' => 'البطاطس المقلية',
            ],
            'photo' => 'example/restaurant/productItem/frites.jpg',
            'product_item_category_id' => $productItemCategoryPotatosId,
            'price' => 1000,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Potatoes',
                'en' => 'Potatoes',
                'tn' => 'Potatoes',
                'ar' => 'بطاطس',
            ],
            'photo' => 'example/restaurant/productItem/potatos.jpg',
            'product_item_category_id' => $productItemCategoryPotatosId,
            'price' => 1200,
        ]);
    }

    /**
     *
     */
    public function productItemsForSauce()
    {
        $productItemCategorySauceId = ProductItemCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")->first()->id;

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Mayonnaise',
                'en' => 'Mayonnaise',
                'tn' => 'Mayonnaise',
                'ar' => 'مايونيز',
            ],
            'photo' => 'example/restaurant/productItem/mayonaise.jpg',
            'product_item_category_id' => $productItemCategorySauceId,
            'price' => 0,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Sauce algérienne',
                'en' => 'Algerian sauce',
                'tn' => 'Sauce algérienne',
                'ar' => 'سوس جزائرية',
            ],
            'photo' => 'example/restaurant/productItem/algerienne.jpg',
            'product_item_category_id' => $productItemCategorySauceId,
            'price' => 0,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Ketchup',
                'en' => 'Ketchup',
                'tn' => 'Ketchup',
                'ar' => 'كاتشب',
            ],
            'photo' => 'example/restaurant/productItem/ketchup.jpg',
            'product_item_category_id' => $productItemCategorySauceId,
            'price' => 0,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Sauce barbecue',
                'en' => 'Barbecue sauce',
                'tn' => 'Sauce barbecue',
                'ar' => 'صلصة الشواء',
            ],
            'photo' => 'example/restaurant/productItem/barbecue_sauce.jpg',
            'product_item_category_id' => $productItemCategorySauceId,
            'price' => 0,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Harissa',
                'en' => 'Harissa',
                'tn' => 'Hrissa',
                'ar' => 'هريسة',
            ],
            'photo' => 'example/restaurant/productItem/harissa.jpg',
            'product_item_category_id' => $productItemCategorySauceId,
            'price' => 0,
        ]);
    }

    /**
     *
     */
    public function productItemsForSaucePizza()
    {

        $productItemCategorySauceId = ProductItemCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce pizza'")->first()->id;

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Sauce tomate',
                'en' => 'Tomato sauce',
                'tn' => 'Sauce tomate',
                'ar' => 'صلصة الطماطم',
            ],
            'photo' => 'example/restaurant/productItem/sauce_tomate.jpg',
            'product_item_category_id' => $productItemCategorySauceId,
            'price' => 0,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Sauce blanche',
                'en' => 'White sauce',
                'tn' => 'Sauce blanche',
                'ar' => 'صلصة بيضاء',
            ],
            'photo' => 'example/restaurant/productItem/sauce_blanche.jpg',
            'product_item_category_id' => $productItemCategorySauceId,
            'price' => 0,
        ]);
    }

    /**
     *
     */
    public function productItemsForSupplement()
    {
        $productItemCategorySupplementId = ProductItemCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first()->id;

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Thon',
                'en' => 'Tuna',
                'tn' => 'Thon',
                'ar' => 'تن',
            ],
            'photo' => 'example/restaurant/productItem/thon.jpg',
            'product_item_category_id' => $productItemCategorySupplementId,
            'price' => 2000,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => '4 fromages',
                'en' => '4 cheese',
                'tn' => '4 fromages',
                'ar' => '4 أجبان',
            ],
            'photo' => 'example/restaurant/productItem/cheese.jpg',
            'product_item_category_id' => $productItemCategorySupplementId,
            'price' => 3500,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Fruits de mer',
                'en' => 'Seafood',
                'tn' => 'Fruits de mer',
                'ar' => 'مأكولات بحرية',
            ],
            'photo' => 'example/restaurant/productItem/fruits_de_mer.jpg',
            'product_item_category_id' => $productItemCategorySupplementId,
            'price' => 4000,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Peperoni',
                'en' => 'Peperoni',
                'tn' => 'Peperoni',
                'ar' => 'بيبروني',
            ],
            'photo' => 'example/restaurant/productItem/peperoni.jpg',
            'product_item_category_id' => $productItemCategorySupplementId,
            'price' => 2500,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Jambon de boeuf',
                'en' => 'Beef ham',
                'tn' => 'Jambon de boeuf',
                'ar' => 'جمبون بقر',
            ],
            'photo' => 'example/restaurant/productItem/jambon_boeuf.jpg',
            'product_item_category_id' => $productItemCategorySupplementId,
            'price' => 2500,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Jambon de dinde',
                'en' => 'Turkey ham',
                'tn' => 'Jambon de dinde',
                'ar' => 'جمبون الديك الرومي',
            ],
            'photo' => 'example/restaurant/productItem/jambon_dinde.jpg',
            'product_item_category_id' => $productItemCategorySupplementId,
            'price' => 2000,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Champignon',
                'en' => 'Mushroom',
                'tn' => 'Champignon',
                'ar' => 'فطر',
            ],
            'photo' => 'example/restaurant/productItem/champignon.jpg',
            'product_item_category_id' => $productItemCategorySupplementId,
            'price' => 2000,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Escalope',
                'en' => 'Escalope',
                'tn' => 'Escalope',
                'ar' => 'اسكالوب',
            ],
            'photo' => 'example/restaurant/productItem/escalope_pizza.jpg',
            'product_item_category_id' => $productItemCategorySupplementId,
            'price' => 2500,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Chawarma',
                'en' => 'Chawarma',
                'tn' => 'Chawarma',
                'ar' => 'شاورما',
            ],
            'photo' => 'example/restaurant/productItem/chawarma.jpg',
            'product_item_category_id' => $productItemCategorySupplementId,
            'price' => 2500,
        ]);

        ProductItem::factory()->create([
            'name' => [
                'fr' => 'Chicken',
                'en' => 'Chicken',
                'tn' => 'Chicken',
                'ar' => 'دجاج',
            ],
            'photo' => 'example/restaurant/productItem/chicken.jpg',
            'product_item_category_id' => $productItemCategorySupplementId,
            'price' => 2500,
        ]);
    }
}
