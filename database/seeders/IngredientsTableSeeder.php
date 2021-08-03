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
        $this->ingredientsForViande();
        $this->ingredientsForSauceFromagere();
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
                'fr'   => 'Riz jaune',
                'en'   => 'Yellow rice',
                'tnfr' => 'Roz asfar',
                'tnar' => 'روز أصفر',
                'ar'   => 'ارز أصفر',
            ],
            'photo' => 'example/restaurant/ingredient/yellow_rice.jpg',
            'ingredient_category_id' => $ingredientCategoryRiceId,
            'price' => 1300,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Riz à l\'ail',
                'en'   => 'Garlic rice',
                'tnfr'   => 'Roz bi thom',
                'tnar' => 'روز بالثوم',
                'ar'   => 'أرز بالثوم',
            ],
            'photo' => 'example/restaurant/ingredient/rice_garlic_persley.jpg',
            'ingredient_category_id' => $ingredientCategoryRiceId,
            'price' => 1600,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Riz fruits sec',
                'en'   => 'Dry fruits rice',
                'tnfr' => 'Roz fruits sec',
                'tnar' => 'روز فواكه جافة',
                'ar'   => 'أرز فواكه جافة',
            ],
            'photo' => 'example/restaurant/ingredient/rice_kajo.jpg',
            'ingredient_category_id' => $ingredientCategoryRiceId,
            'price' => 2000,
        ]);
    }

    /**
     *
     */
    public function ingredientsForSaladOld()
    {
        $ingredientCategorySaladId = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Salade'")->first()->id;

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Salade concombre',
                'en'   => 'Cucumber salad',
                'tnfr' => 'Slatet fa9ous',
                'tnar' => 'سلاطة فقوس',
                'ar'   => 'سلطة خيار',
            ],
            'photo' => 'example/restaurant/ingredient/salad_concumber.jpg',
            'ingredient_category_id' => $ingredientCategorySaladId,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Salade choux rouge',
                'en'   => 'Red cabbage salad',
                'tnfr' => 'Salatet cromb a7mar',
                'tnar' => 'سلاطة كرمب أحمر',
                'ar'   => 'سلطة ملفوف أحمر',
            ],
            'photo' => 'example/restaurant/ingredient/salad_kronb.jpg',
            'ingredient_category_id' => $ingredientCategorySaladId,
        ]);

/*
        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Salade fruits de mer',
                'en'   => 'Seafood salad',
                'tnfr' => 'Slatet fruits de mer',
                'tnar' => 'سلاطة غلال البحر',
                'ar'   => 'سلطة غلال البحر',
            ],
            'photo' => 'example/restaurant/ingredient/salade_fruit_de_mer.jpg',
            'ingredient_category_id' => $ingredientCategorySaladId,
        ]);
*/

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Salade carotte',
                'en'   => 'Carrot salad',
                'tnfr' => 'Slatet sfennaria',
                'tnar' => 'سلاطة سفناريا',
                'ar'   => 'سلطة الجزر',
            ],
            'photo' => 'example/restaurant/ingredient/salad_carrot.jpg',
            'ingredient_category_id' => $ingredientCategorySaladId,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Salade betterave',
                'en'   => 'Beet salad',
                'tnfr' => 'Slatet bettrave',
                'tnar' => 'سلطة بتراف',
                'ar'   => 'سلطة البنجر',
            ],
            'photo' => 'example/restaurant/ingredient/salad_beet.jpg',
            'ingredient_category_id' => $ingredientCategorySaladId,
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
                'fr'   => 'Laitue',
                'en'   => 'Cucumber salad',
                'tnfr' => 'Laitue',
                'tnar' => 'خس',
                'ar'   => 'خس',
            ],
            'photo' => 'example/restaurant/ingredient/laitue.jpg',
            'ingredient_category_id' => $ingredientCategorySaladId,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Tomate',
                'en'   => 'Tomato',
                'tnfr' => 'Tmatem',
                'tnar' => 'طماطم',
                'ar'   => 'طماطم',
            ],
            'photo' => 'example/restaurant/ingredient/tomate.jpg',
            'ingredient_category_id' => $ingredientCategorySaladId,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Oignon',
                'en'   => 'Onion',
                'tnfr' => 'Bsal',
                'tnar' => 'بصل',
                'ar'   => 'بصل',
            ],
            'photo' => 'example/restaurant/ingredient/onion.jpg',
            'ingredient_category_id' => $ingredientCategorySaladId,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Oignon sauté',
                'en'   => 'Sauteed onion',
                'tnfr' => 'Bsal sauté',
                'tnar' => 'بصل سوتيه',
                'ar'   => 'بصل سوتيه',
            ],
            'photo' => 'example/restaurant/ingredient/onionsaute.jpg',
            'ingredient_category_id' => $ingredientCategorySaladId,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Corotte',
                'en'   => 'Corot',
                'tnfr' => 'Sfennaria',
                'tnar' => 'سفنارية',
                'ar'   => 'جزر',
            ],
            'photo' => 'example/restaurant/ingredient/carotte.jpg',
            'ingredient_category_id' => $ingredientCategorySaladId,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Choux rouge',
                'en'   => 'Red cabbage',
                'tnfr' => 'Cromb a7mar',
                'tnar' => 'كرمب أحمر',
                'ar'   => 'ملفوف أحمر',
            ],
            'photo' => 'example/restaurant/ingredient/chouxrouge.jpg',
            'ingredient_category_id' => $ingredientCategorySaladId,
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
                'fr'   => 'Frites',
                'en'   => 'French fries',
                'tnfr' => 'Frites',
                'tnar' => 'فريت',
                'ar'   => 'البطاطس المقلية',
            ],
            'photo' => 'example/restaurant/ingredient/frites.jpg',
            'ingredient_category_id' => $ingredientCategoryPotatosId,
        ]);
/*
        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Potatoes',
                'en'   => 'Potatoes',
                'tnfr' => 'Potatoes',
                'tnar' => 'بوتيتوس ',
                'ar'   => 'بطاطس',
            ],
            'photo' => 'example/restaurant/ingredient/potatos.jpg',
            'ingredient_category_id' => $ingredientCategoryPotatosId,
        ]);
*/
    }

    /**
     *
     */
    public function ingredientsForSauce()
    {
        $ingredientCategorySauceId = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")->first()->id;

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Harissa',
                'en'   => 'Harissa',
                'tnfr' => 'Hrissa',
                'tnar' => 'هريسة',
                'ar'   => 'هريسة',
            ],
            'photo' => 'example/restaurant/ingredient/harissa.jpg',
            'ingredient_category_id' => $ingredientCategorySauceId,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Mayonnaise',
                'en'   => 'Mayonnaise',
                'tnfr' => 'Mayonnaise',
                'tnar' => 'مايونيز',
                'ar'   => 'مايونيز',
            ],
            'photo' => 'example/restaurant/ingredient/mayonaise.jpg',
            'ingredient_category_id' => $ingredientCategorySauceId,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Sauce algérienne',
                'en'   => 'Algerian sauce',
                'tnfr' => 'Sauce algérienne',
                'tnar' => 'سوس ألجريان',
                'ar'   => 'سوس جزائرية',
            ],
            'photo' => 'example/restaurant/ingredient/algerienne.jpg',
            'ingredient_category_id' => $ingredientCategorySauceId,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Ketchup',
                'en'   => 'Ketchup',
                'tnfr' => 'Ketchup',
                'tnar' => 'كاتشب',
                'ar'   => 'كاتشب',
            ],
            'photo' => 'example/restaurant/ingredient/ketchup.jpg',
            'ingredient_category_id' => $ingredientCategorySauceId,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Sauce barbecue',
                'en'   => 'Barbecue sauce',
                'tnfr' => 'Sauce barbecue',
                'tnar' => 'سوس باربكيو',
                'ar'   => 'سوس باربكيو',
            ],
            'photo' => 'example/restaurant/ingredient/barbecue_sauce.jpg',
            'ingredient_category_id' => $ingredientCategorySauceId,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Sauce houmous',
                'en'   => 'Houmous sauce',
                'tnfr' => 'Sauce 7oms',
                'tnar' => 'سوس حمص',
                'ar'   => 'صوص الحمص',
            ],
            'photo' => 'example/restaurant/ingredient/saucehommos.jpg',
            'ingredient_category_id' => $ingredientCategorySauceId,
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
                'fr'   => 'Sauce tomate',
                'en'   => 'Tomato sauce',
                'tnfr' => 'Sauce tomate',
                'tnar' => 'سوس طماطم',
                'ar'   => 'صلصة الطماطم',
            ],
            'photo' => 'example/restaurant/ingredient/sauce_tomate.jpg',
            'ingredient_category_id' => $ingredientCategorySauceId,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Sauce blanche',
                'en'   => 'White sauce',
                'tnfr' => 'Sauce blanche',
                'tnar' => 'سوس بلانش',
                'ar'   => 'صلصة بيضاء',
            ],
            'photo' => 'example/restaurant/ingredient/sauce_blanche.jpg',
            'ingredient_category_id' => $ingredientCategorySauceId,
        ]);
    }

    /**
     *
     */
    public function ingredientsForSauceFromagere()
    {
        $ingredientCategorySauceFromagereId = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce fromagère'")->first()->id;

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Sauce fromagère',
                'en'   => 'Cheese sauce',
                'tnfr' => 'Sauce fromagère',
                'tnar' => 'سوس فرماج',
                'ar'   => 'صلصة الجبنة',
            ],
            'photo' => 'example/restaurant/ingredient/sauce_fromage.png',
            'ingredient_category_id' => $ingredientCategorySauceFromagereId,
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
                'fr'   => 'Bacon',
                'en'   => 'Bacon',
                'tnfr' => 'Bacon',
                'tnar' => 'بايكون',
                'ar'   => 'بايكون',
            ],
            'photo' => 'example/restaurant/ingredient/bacon.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 200,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Peperoni',
                'en'   => 'Peperoni',
                'tnfr' => 'Peperoni',
                'tnar' => 'بيبروني',
                'ar'   => 'بيبروني',
            ],
            'photo' => 'example/restaurant/ingredient/peperoni.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 200,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Jambon de boeuf',
                'en'   => 'Beef ham',
                'tnfr' => 'Jambon de boeuf',
                'tnar' => 'جمبون بقر',
                'ar'   => 'جمبون بقر',
            ],
            'photo' => 'example/restaurant/ingredient/jambon_boeuf.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 200,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Jambon de dinde',
                'en'   => 'Turkey ham',
                'tnfr' => 'Jambon dinde',
                'tnar' => 'جمبون دندون',
                'ar'   => 'جمبون الديك الرومي',
            ],
            'photo' => 'example/restaurant/ingredient/jambon_dinde.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 200,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Champignon',
                'en'   => 'Mushroom',
                'tnfr' => 'Champignon',
                'tnar' => 'فطر',
                'ar'   => 'فطر',
            ],
            'photo' => 'example/restaurant/ingredient/champignon.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 200,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Cheddar',
                'en'   => 'Cheddar',
                'tnfr' => 'Cheddar',
                'tnar' => 'شيدر',
                'ar'   => 'شيدر',
            ],
            'photo' => 'example/restaurant/ingredient/cheddar.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 200,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Raclette',
                'en'   => 'Raclette',
                'tnfr' => 'Raclette',
                'tnar' => 'راكليت',
                'ar'   => 'راكليت',
            ],
            'photo' => 'example/restaurant/ingredient/raclette.png',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 200,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Gruyère',
                'en'   => 'Gruyere',
                'tnfr' => 'Gruyère',
                'tnar' => 'غرويير',
                'ar'   => 'غرويير',
            ],
            'photo' => 'example/restaurant/ingredient/gruyere.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 200,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Halloumi grillé',
                'en'   => 'Grilled halloumi',
                'tnfr' => 'Halloumi mechwi',
                'tnar' => 'حلومي مشوي',
                'ar'   => 'حلومي مشوي',
            ],
            'photo' => 'example/restaurant/ingredient/halloumi.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 200,
        ]);
    }

    /**
     *
     */
    public function ingredientsForViande()
    {
        $ingredientCategoryViandeId = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Viande'")->first()->id;

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Chawarma',
                'en'   => 'Chawarma',
                'tnfr' => 'Chawarma',
                'tnar' => 'شاورما',
                'ar'   => 'شاورما',
            ],
            'photo' => 'example/restaurant/ingredient/chawarma.jpg',
            'ingredient_category_id' => $ingredientCategoryViandeId,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Tenders',
                'en'   => 'Tenders',
                'tnfr' => 'Tenders',
                'tnar' => 'تندر',
                'ar'   => 'تندر',
            ],
            'photo' => 'example/restaurant/ingredient/tender.jpg',
            'ingredient_category_id' => $ingredientCategoryViandeId,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Escalope',
                'en'   => 'Escalope',
                'tnfr' => 'Escalope',
                'tnar' => 'اسكالوب',
                'ar'   => 'اسكالوب',
            ],
            'photo' => 'example/restaurant/ingredient/escalope_pizza.jpg',
            'ingredient_category_id' => $ingredientCategoryViandeId,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Nuggets',
                'en'   => 'Nuggets',
                'tnfr' => 'Nuggets',
                'tnar' => 'ناجت',
                'ar'   => 'ناجت',
            ],
            'photo' => 'example/restaurant/ingredient/nugget.jpg',
            'ingredient_category_id' => $ingredientCategoryViandeId,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Chicken',
                'en'   => 'Chicken',
                'tnfr' => 'Chicken',
                'tnar' => 'دجاج',
                'ar'   => 'دجاج',
            ],
            'photo' => 'example/restaurant/ingredient/chicken.jpg',
            'ingredient_category_id' => $ingredientCategoryViandeId,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Thon',
                'en'   => 'Tuna',
                'tnfr' => 'Thon',
                'tnar' => 'تن',
                'ar'   => 'تن',
            ],
            'photo' => 'example/restaurant/ingredient/thon.jpg',
            'ingredient_category_id' => $ingredientCategoryViandeId,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Fruits de mer',
                'en'   => 'Seafood',
                'tnfr' => 'Fruits de mer',
                'tnar' => 'غلال البحر',
                'ar'   => 'غلال البحر',
            ],
            'photo' => 'example/restaurant/ingredient/fruits_de_mer.jpg',
            'ingredient_category_id' => $ingredientCategoryViandeId,
        ]);

    }

    /**
     *
     */
    public function ingredientsForPizzaSupplement()
    {
        // TODO: pizza supplement ingredientCategory doesn't exist
        $ingredientCategorySupplementId = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first()->id;

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Thon',
                'en'   => 'Tuna',
                'tnfr' => 'Thon',
                'tnar' => 'تن',
                'ar'   => 'تن',
            ],
            'photo' => 'example/restaurant/ingredient/thon.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 2000,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => '4 fromages',
                'en'   => '4 cheese',
                'tnfr' => '4 fromages',
                'tnar' => '4 فرماج',
                'ar'   => '4 أجبان',
            ],
            'photo' => 'example/restaurant/ingredient/cheese.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 3500,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Fruits de mer',
                'en'   => 'Seafood',
                'tnfr' => 'Fruits de mer',
                'tnar' => 'غلال البحر',
                'ar'   => 'غلال البحر',
            ],
            'photo' => 'example/restaurant/ingredient/fruits_de_mer.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 4000,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Peperoni',
                'en'   => 'Peperoni',
                'tnfr' => 'Peperoni',
                'tnar' => 'بيبروني',
                'ar'   => 'بيبروني',
            ],
            'photo' => 'example/restaurant/ingredient/peperoni.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 2500,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Jambon de boeuf',
                'en'   => 'Beef ham',
                'tnfr' => 'Jambon de boeuf',
                'tnar' => 'جمبون بقري',
                'ar'   => 'جمبون بقر',
            ],
            'photo' => 'example/restaurant/ingredient/jambon_boeuf.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 2500,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Jambon de dinde',
                'en'   => 'Turkey ham',
                'tnfr' => 'Jambon dinde',
                'tnar' => 'جمبون دندون',
                'ar'   => 'جمبون الديك الرومي',
            ],
            'photo' => 'example/restaurant/ingredient/jambon_dinde.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 2000,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Champignon',
                'en'   => 'Mushroom',
                'tnfr' => 'Champignon',
                'tnar' => 'فطر',
                'ar'   => 'فطر',
            ],
            'photo' => 'example/restaurant/ingredient/champignon.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 2000,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Escalope',
                'en'   => 'Escalope',
                'tnfr' => 'Escalope',
                'tnar' => 'اسكالوب',
                'ar'   => 'اسكالوب',
            ],
            'photo' => 'example/restaurant/ingredient/escalope_pizza.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 2500,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Chawarma',
                'en'   => 'Chawarma',
                'tnfr' => 'Chawarma',
                'tnar' => 'شاورما',
                'ar'   => 'شاورما',
            ],
            'photo' => 'example/restaurant/ingredient/chawarma.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 2500,
        ]);

        Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Chicken',
                'en'   => 'Chicken',
                'tnfr' => 'Chicken',
                'tnar' => 'دجاج',
                'ar'   => 'دجاج',
            ],
            'photo' => 'example/restaurant/ingredient/chicken.jpg',
            'ingredient_category_id' => $ingredientCategorySupplementId,
            'price' => 2500,
        ]);
    }
}
