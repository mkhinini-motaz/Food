<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\IngredientCategory;

use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $this->ingredientsForRice();
        $this->ingredientsForSalad();
        $this->ingredientsForPotatos();
        $this->ingredientsForSauce();
        $this->ingredientsForSaucePizza();
        $this->ingredientsForSupplement();
    }

    /**
     *
     */
    public function ingredientsForRice()
    {
        $ingredientCategoryRiceId = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Riz'")->first()->id;

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Riz jaune',
                'en' => 'Yellow rice',
                'tn' => 'Roz asfar',
                'ar' => 'ارز أصفر',
            ],
            'photo' => 'example/restaurant/ingredient/yellow_rice.jpg',
            'ingredient_category_id' => $ingredientCategoryRiceId,
            'price' => 1300,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Riz à l\'ail',
                'en' => 'Garlic rice',
                'tn' => 'Roz 3al thom',
                'ar' => 'أرز بالثوم',
            ],
            'photo' => 'example/restaurant/ingredient/rice_garlic_persley.jpg',
            'ingredient_category_id' => $ingredientCategoryRiceId,
            'price' => 1600,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Riz fruits sec',
                'en' => 'Dry fruits rice',
                'tn' => 'Roz fruits sec',
                'ar' => 'أرز فواكه جافة',
            ],
            'photo' => 'example/restaurant/ingredient/rice_kajo.jpg',
            'ingredient_category_id' => $ingredientCategoryRiceId,
            'price' => 2000,
        ]);
    }

    /**
     *
     */
    public function ingredientsForSalad()
    {
        $ingredientCategorySaladId = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Salade'")->first()->id;

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Salade concombre',
                'en' => 'Cucumber salad',
                'tn' => 'Slatet fa9ous',
                'ar' => 'سلطة خيار',
            ],
            'photo' => 'example/restaurant/ingredient/salad_concumber.jpg',
            'ingredient_category_id' => $ingredientCategorySaladId,
            'price' => 1200,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Salade choux rouge',
                'en' => 'Red cabbage salad',
                'tn' => 'Salatet cromb a7mar',
                'ar' => 'سلطة ملفوف أحمر',
            ],
            'photo' => 'example/restaurant/ingredient/salad_kronb.jpg',
            'ingredient_category_id' => $ingredientCategorySaladId,
            'price' => 1200,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Salade fruits de mer',
                'en' => 'Seafood salad',
                'tn' => 'Slatet fruits de mer',
                'ar' => 'سلطة المأكولات البحرية',
            ],
            'photo' => 'example/restaurant/ingredient/salade_fruit_de_mer.jpg',
            'ingredient_category_id' => $ingredientCategorySaladId,
            'price' => 2500,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Salade carotte',
                'en' => 'Carrot salad',
                'tn' => 'Slatet sfennaria',
                'ar' => 'سلطة الجزر',
            ],
            'photo' => 'example/restaurant/ingredient/salad_carrot.jpg',
            'ingredient_category_id' => $ingredientCategorySaladId,
            'price' => 1200,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Salade betterave',
                'en' => 'Beet salad',
                'tn' => 'Slatet bettrave',
                'ar' => 'سلطة البنجر',
            ],
            'photo' => 'example/restaurant/ingredient/salad_beet.jpg',
            'ingredient_category_id' => $ingredientCategorySaladId,
            'price' => 1800,
        ]);
    }

    /**
     *
     */
    public function ingredientsForPotatos()
    {
        $ingredientCategoryPotatosId = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pomme de terre'")->first()->id;

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Frites',
                'en' => 'French fries',
                'tn' => 'Frites',
                'ar' => 'البطاطس المقلية',
            ],
            'photo' => 'example/restaurant/ingredient/frites.jpg',
            'ingredient_category_id' => $ingredientCategoryPotatosId,
            'price' => 1000,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Potatoes',
                'en' => 'Potatoes',
                'tn' => 'Potatoes',
                'ar' => 'بطاطس',
            ],
            'photo' => 'example/restaurant/ingredient/potatos.jpg',
            'ingredient_category_id' => $ingredientCategoryPotatosId,
            'price' => 1200,
        ]);
    }

    /**
     *
     */
    public function ingredientsForSauce()
    {
        $ingredientCategorySauceId = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")->first()->id;

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Mayonnaise',
                'en' => 'Mayonnaise',
                'tn' => 'Mayonnaise',
                'ar' => 'مايونيز',
            ],
            'photo' => 'example/restaurant/ingredient/mayonaise.jpg',
            'ingredient_category_id' => $ingredientCategorySauceId,
            'price' => 0,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Sauce algérienne',
                'en' => 'Algerian sauce',
                'tn' => 'Sauce algérienne',
                'ar' => 'سوس جزائرية',
            ],
            'photo' => 'example/restaurant/ingredient/algerienne.jpg',
            'ingredient_category_id' => $ingredientCategorySauceId,
            'price' => 0,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Ketchup',
                'en' => 'Ketchup',
                'tn' => 'Ketchup',
                'ar' => 'كاتشب',
            ],
            'photo' => 'example/restaurant/ingredient/ketchup.jpg',
            'ingredient_category_id' => $ingredientCategorySauceId,
            'price' => 0,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Sauce barbecue',
                'en' => 'Barbecue sauce',
                'tn' => 'Sauce barbecue',
                'ar' => 'صلصة الشواء',
            ],
            'photo' => 'example/restaurant/ingredient/barbecue_sauce.jpg',
            'ingredient_category_id' => $ingredientCategorySauceId,
            'price' => 0,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Harissa',
                'en' => 'Harissa',
                'tn' => 'Hrissa',
                'ar' => 'هريسة',
            ],
            'photo' => 'example/restaurant/ingredient/harissa.jpg',
            'ingredient_category_id' => $ingredientCategorySauceId,
            'price' => 0,
        ]);
    }

    /**
     *
     */
    public function ingredientsForSaucePizza()
    {

        $ingredientCategorySauceId = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce pizza'")->first()->id;

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Sauce tomate',
                'en' => 'Tomato sauce',
                'tn' => 'Sauce tomate',
                'ar' => 'صلصة الطماطم',
            ],
            'photo' => 'example/restaurant/ingredient/sauce_tomate.jpg',
            'ingredient_category_id' => $ingredientCategorySauceId,
            'price' => 0,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Sauce blanche',
                'en' => 'White sauce',
                'tn' => 'Sauce blanche',
                'ar' => 'صلصة بيضاء',
            ],
            'photo' => 'example/restaurant/ingredient/sauce_blanche.jpg',
            'ingredient_category_id' => $ingredientCategorySauceId,
            'price' => 0,
        ]);
    }

    /**
     *
     */
    public function ingredientsForSupplement()
    {
        $ingredientCategorySupplementId = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first()->id;

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Thon',
                'en' => 'Tuna',
                'tn' => 'Thon',
                'ar' => 'تن',
            ],
            'photo' => 'example/restaurant/ingredient/thon.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 2000,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => '4 fromages',
                'en' => '4 cheese',
                'tn' => '4 fromages',
                'ar' => '4 أجبان',
            ],
            'photo' => 'example/restaurant/ingredient/cheese.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 3500,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Fruits de mer',
                'en' => 'Seafood',
                'tn' => 'Fruits de mer',
                'ar' => 'مأكولات بحرية',
            ],
            'photo' => 'example/restaurant/ingredient/fruits_de_mer.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 4000,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Peperoni',
                'en' => 'Peperoni',
                'tn' => 'Peperoni',
                'ar' => 'بيبروني',
            ],
            'photo' => 'example/restaurant/ingredient/peperoni.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 2500,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Jambon de boeuf',
                'en' => 'Beef ham',
                'tn' => 'Jambon de boeuf',
                'ar' => 'جمبون بقر',
            ],
            'photo' => 'example/restaurant/ingredient/jambon_boeuf.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 2500,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Jambon de dinde',
                'en' => 'Turkey ham',
                'tn' => 'Jambon de dinde',
                'ar' => 'جمبون الديك الرومي',
            ],
            'photo' => 'example/restaurant/ingredient/jambon_dinde.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 2000,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Champignon',
                'en' => 'Mushroom',
                'tn' => 'Champignon',
                'ar' => 'فطر',
            ],
            'photo' => 'example/restaurant/ingredient/champignon.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 2000,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Escalope',
                'en' => 'Escalope',
                'tn' => 'Escalope',
                'ar' => 'اسكالوب',
            ],
            'photo' => 'example/restaurant/ingredient/escalope_pizza.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 2500,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Chawarma',
                'en' => 'Chawarma',
                'tn' => 'Chawarma',
                'ar' => 'شاورما',
            ],
            'photo' => 'example/restaurant/ingredient/chawarma.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 2500,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr' => 'Chicken',
                'en' => 'Chicken',
                'tn' => 'Chicken',
                'ar' => 'دجاج',
            ],
            'photo' => 'example/restaurant/ingredient/chicken.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 2500,
        ]);
    }
}
