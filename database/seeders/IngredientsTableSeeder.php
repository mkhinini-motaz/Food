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
        $ingredientCategoryRice = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Riz'")->first();

        $ingredientRizJaune = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Riz jaune',
                'en'   => 'Yellow rice',
                'tnfr' => 'Roz asfar',
                'tnar' => 'روز أصفر',
                'ar'   => 'ارز أصفر',
            ],
            'photo' => 'example/restaurant/ingredient/yellow_rice.jpg',
        ]);

        $ingredientRizAil = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Riz à l\'ail',
                'en'   => 'Garlic rice',
                'tnfr' => 'Roz bi thom',
                'tnar' => 'روز بالثوم',
                'ar'   => 'أرز بالثوم',
            ],
            'photo' => 'example/restaurant/ingredient/rice_garlic_persley.jpg',
        ]);

        $ingredientRizFruitsSec = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Riz fruits sec',
                'en'   => 'Dry fruits rice',
                'tnfr' => 'Roz fruits sec',
                'tnar' => 'روز فواكه جافة',
                'ar'   => 'أرز فواكه جافة',
            ],
            'photo' => 'example/restaurant/ingredient/rice_kajo.jpg',
        ]);

        $order = 1;
        $ingredientCategoryRice->ingredients()->sync([
            $ingredientRizJaune->id     => [ 'order' => $order++, 'is_by_default_selected' => 1 ],
            $ingredientRizAil->id       => [ 'order' => $order++, ],
            $ingredientRizFruitsSec->id => [ 'order' => $order++, ],
        ]);
    }

    /**
     *
     */
    public function ingredientsForSaladOld()
    {
        $ingredientCategorySalad = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Salade'")->first();

        $ingredientSaladeConcombre = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Salade concombre',
                'en'   => 'Cucumber salad',
                'tnfr' => 'Slatet fa9ous',
                'tnar' => 'سلاطة فقوس',
                'ar'   => 'سلطة خيار',
            ],
            'photo' => 'example/restaurant/ingredient/salad_concumber.jpg',
        ]);

        $ingredientSaladeChouxRouge = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Salade choux rouge',
                'en'   => 'Red cabbage salad',
                'tnfr' => 'Salatet cromb a7mar',
                'tnar' => 'سلاطة كرمب أحمر',
                'ar'   => 'سلطة ملفوف أحمر',
            ],
            'photo' => 'example/restaurant/ingredient/salad_kronb.jpg',
        ]);

/*
        $ingredientSaSaladeFruitsDeMer = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Salade fruits de mer',
                'en'   => 'Seafood salad',
                'tnfr' => 'Slatet fruits de mer',
                'tnar' => 'سلاطة غلال البحر',
                'ar'   => 'سلطة غلال البحر',
            ],
            'photo' => 'example/restaurant/ingredient/salade_fruit_de_mer.jpg',
        ]);
*/

        $ingredientSaladeCarotte = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Salade carotte',
                'en'   => 'Carrot salad',
                'tnfr' => 'Slatet sfennaria',
                'tnar' => 'سلاطة سفناريا',
                'ar'   => 'سلطة الجزر',
            ],
            'photo' => 'example/restaurant/ingredient/salad_carrot.jpg',
        ]);

        $ingredientSaladeBetterave = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Salade betterave',
                'en'   => 'Beet salad',
                'tnfr' => 'Slatet bettrave',
                'tnar' => 'سلطة بتراف',
                'ar'   => 'سلطة البنجر',
            ],
            'photo' => 'example/restaurant/ingredient/salad_beet.jpg',
        ]);

        $order = 1;
        $ingredientCategorySalad->ingredients()->sync([
            $ingredientSaladeConcombre     => [ 'order' => $order++ ],
            $ingredientSaladeChouxRouge    => [ 'order' => $order++ ],
//            $ingredientSaSaladeFruitsDeMer => [ 'order' => $order++ ],
            $ingredientSaladeCarotte       => [ 'order' => $order++ ],
            $ingredientSaladeBetterave     => [ 'order' => $order++ ],
        ]);
    }

    /**
     *
     */
    public function ingredientsForSalad()
    {
        $ingredientCategorySalad = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Salade'")->first();

        $ingredientLaitue = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Laitue',
                'en'   => 'Cucumber salad',
                'tnfr' => 'Laitue',
                'tnar' => 'خس',
                'ar'   => 'خس',
            ],
            'photo' => 'example/restaurant/ingredient/laitue.jpg',
        ]);

        $ingredientTomate = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Tomate',
                'en'   => 'Tomato',
                'tnfr' => 'Tmatem',
                'tnar' => 'طماطم',
                'ar'   => 'طماطم',
            ],
            'photo' => 'example/restaurant/ingredient/tomate.jpg',
        ]);

        $ingredientOignon = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Oignon',
                'en'   => 'Onion',
                'tnfr' => 'Bsal',
                'tnar' => 'بصل',
                'ar'   => 'بصل',
            ],
            'photo' => 'example/restaurant/ingredient/onion.jpg',
        ]);

        $ingredientOignonSaute = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Oignon sauté',
                'en'   => 'Sauteed onion',
                'tnfr' => 'Bsal sauté',
                'tnar' => 'بصل سوتيه',
                'ar'   => 'بصل سوتيه',
            ],
            'photo' => 'example/restaurant/ingredient/onionsaute.jpg',
        ]);

        $ingredientCarotte = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Corotte',
                'en'   => 'Corot',
                'tnfr' => 'Sfennaria',
                'tnar' => 'سفنارية',
                'ar'   => 'جزر',
            ],
            'photo' => 'example/restaurant/ingredient/carotte.jpg',
        ]);

        $ingredientChouxRouge = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Choux rouge',
                'en'   => 'Red cabbage',
                'tnfr' => 'Cromb a7mar',
                'tnar' => 'كرمب أحمر',
                'ar'   => 'ملفوف أحمر',
            ],
            'photo' => 'example/restaurant/ingredient/chouxrouge.jpg',
        ]);

        $order = 1;
        $ingredientCategorySalad->ingredients()->sync([
            $ingredientLaitue->id      => [ 'order' => $order++, 'is_by_default_selected' => 1 ],
            $ingredientTomate->id      => [ 'order' => $order++, 'is_by_default_selected' => 1 ],
            $ingredientOignon->id      => [ 'order' => $order++, 'is_by_default_selected' => 1 ],
            $ingredientOignonSaute->id => [ 'order' => $order++, ],
            $ingredientCarotte->id     => [ 'order' => $order++, ],
            $ingredientChouxRouge->id  => [ 'order' => $order++, ],
        ]);
    }

    /**
     *
     */
    public function ingredientsForPotatos()
    {
        $ingredientCategoryPotatos = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pomme de terre'")->first();

        $ingredientFrites = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Frites',
                'en'   => 'French fries',
                'tnfr' => 'Frites',
                'tnar' => 'فريت',
                'ar'   => 'البطاطس المقلية',
            ],
            'photo' => 'example/restaurant/ingredient/frites.jpg',
        ]);
/*
        $ingredientPotatoes = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Potatoes',
                'en'   => 'Potatoes',
                'tnfr' => 'Potatoes',
                'tnar' => 'بوتيتوس ',
                'ar'   => 'بطاطس',
            ],
            'photo' => 'example/restaurant/ingredient/potatos.jpg',
        ]);
*/

        $order = 1;
        $ingredientCategoryPotatos->ingredients()->sync([
            $ingredientFrites->id      => [ 'order' => $order++, 'is_by_default_selected' => 1 ],
//            $ingredientPotatoes->id      => [ 'order' => $order++, ],
        ]);
    }

    /**
     *
     */
    public function ingredientsForSauce()
    {
        $ingredientCategorySauce = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")->first();

        $ingredientHarissa = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Harissa',
                'en'   => 'Harissa',
                'tnfr' => 'Hrissa',
                'tnar' => 'هريسة',
                'ar'   => 'هريسة',
            ],
            'photo' => 'example/restaurant/ingredient/harissa.jpg',
        ]);

        $ingredientMayonnaise = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Mayonnaise',
                'en'   => 'Mayonnaise',
                'tnfr' => 'Mayonnaise',
                'tnar' => 'مايونيز',
                'ar'   => 'مايونيز',
            ],
            'photo' => 'example/restaurant/ingredient/mayonaise.jpg',
        ]);

        $ingredientSauceAlgerienne = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Sauce algérienne',
                'en'   => 'Algerian sauce',
                'tnfr' => 'Sauce algérienne',
                'tnar' => 'سوس ألجريان',
                'ar'   => 'سوس جزائرية',
            ],
            'photo' => 'example/restaurant/ingredient/algerienne.jpg',
        ]);

        $ingredientKetchup = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Ketchup',
                'en'   => 'Ketchup',
                'tnfr' => 'Ketchup',
                'tnar' => 'كاتشب',
                'ar'   => 'كاتشب',
            ],
            'photo' => 'example/restaurant/ingredient/ketchup.jpg',
        ]);

        $ingredientSauceBarbecue = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Sauce barbecue',
                'en'   => 'Barbecue sauce',
                'tnfr' => 'Sauce barbecue',
                'tnar' => 'سوس باربكيو',
                'ar'   => 'سوس باربكيو',
            ],
            'photo' => 'example/restaurant/ingredient/barbecue_sauce.jpg',
        ]);

        $ingredientSauceHoumous = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Sauce houmous',
                'en'   => 'Houmous sauce',
                'tnfr' => 'Sauce 7oms',
                'tnar' => 'سوس حمص',
                'ar'   => 'صوص الحمص',
            ],
            'photo' => 'example/restaurant/ingredient/saucehommos.jpg',
        ]);

        $order = 1;
        $ingredientCategorySauce->ingredients()->sync([
            $ingredientHarissa->id         => [ 'order' => $order++, 'is_by_default_selected' => 1 ],
            $ingredientMayonnaise->id      => [ 'order' => $order++, 'is_by_default_selected' => 1 ],
            $ingredientSauceAlgerienne->id => [ 'order' => $order++ ],
            $ingredientKetchup->id         => [ 'order' => $order++ ],
            $ingredientSauceBarbecue->id   => [ 'order' => $order++ ],
            $ingredientSauceHoumous->id    => [ 'order' => $order++ ],
        ]);
    }

    /**
     *
     */
    public function ingredientsForSaucePizza()
    {

        $ingredientCategorySauce = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce pizza'")->first();

        $ingredientSauceTomate = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Sauce tomate',
                'en'   => 'Tomato sauce',
                'tnfr' => 'Sauce tomate',
                'tnar' => 'سوس طماطم',
                'ar'   => 'صلصة الطماطم',
            ],
            'photo' => 'example/restaurant/ingredient/sauce_tomate.jpg',
        ]);

        $ingredientSauceBlanche = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Sauce blanche',
                'en'   => 'White sauce',
                'tnfr' => 'Sauce blanche',
                'tnar' => 'سوس بلانش',
                'ar'   => 'صلصة بيضاء',
            ],
            'photo' => 'example/restaurant/ingredient/sauce_blanche.jpg',
        ]);

        $order = 1;
        $ingredientCategorySauce->ingredients()->sync([
            $ingredientSauceTomate->id  => [ 'order' => $order++, 'is_by_default_selected' => 1 ],
            $ingredientSauceBlanche->id => [ 'order' => $order++, ],
        ]);
    }

    /**
     *
     */
    public function ingredientsForSauceFromagere()
    {
        $ingredientCategorySauceFromagere = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce fromagère'")->first();

        $ingredientSauceFromagere = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Sauce fromagère',
                'en'   => 'Cheese sauce',
                'tnfr' => 'Sauce fromagère',
                'tnar' => 'سوس فرماج',
                'ar'   => 'صلصة الجبنة',
            ],
            'photo' => 'example/restaurant/ingredient/sauce_fromage.png',
        ]);

        $order = 1;
        $ingredientCategorySauceFromagere->ingredients()->sync([
            $ingredientSauceFromagere->id => [ 'order' => $order++, 'is_by_default_selected' => 1 ],
        ]);
    }

    /**
     *
     */
    public function ingredientsForSupplement()
    {
        $ingredientCategorySupplement = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first();

        $ingredientBacon = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Bacon',
                'en'   => 'Bacon',
                'tnfr' => 'Bacon',
                'tnar' => 'بايكون',
                'ar'   => 'بايكون',
            ],
            'photo' => 'example/restaurant/ingredient/bacon.jpg',
        ]);

        $ingredientPeperoni = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Peperoni',
                'en'   => 'Peperoni',
                'tnfr' => 'Peperoni',
                'tnar' => 'بيبروني',
                'ar'   => 'بيبروني',
            ],
            'photo' => 'example/restaurant/ingredient/peperoni.jpg',
        ]);

        $ingredientJambonBoeuf = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Jambon de boeuf',
                'en'   => 'Beef ham',
                'tnfr' => 'Jambon de boeuf',
                'tnar' => 'جمبون بقر',
                'ar'   => 'جمبون بقر',
            ],
            'photo' => 'example/restaurant/ingredient/jambon_boeuf.jpg',
        ]);

        $ingredientJambonDinde = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Jambon de dinde',
                'en'   => 'Turkey ham',
                'tnfr' => 'Jambon dinde',
                'tnar' => 'جمبون دندون',
                'ar'   => 'جمبون الديك الرومي',
            ],
            'photo' => 'example/restaurant/ingredient/jambon_dinde.jpg',
        ]);

        $ingredientChampignon = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Champignon',
                'en'   => 'Mushroom',
                'tnfr' => 'Champignon',
                'tnar' => 'فطر',
                'ar'   => 'فطر',
            ],
            'photo' => 'example/restaurant/ingredient/champignon.jpg',
        ]);

        $ingredientCheddar = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Cheddar',
                'en'   => 'Cheddar',
                'tnfr' => 'Cheddar',
                'tnar' => 'شيدر',
                'ar'   => 'شيدر',
            ],
            'photo' => 'example/restaurant/ingredient/cheddar.jpg',
        ]);

        $ingredientRaclette = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Raclette',
                'en'   => 'Raclette',
                'tnfr' => 'Raclette',
                'tnar' => 'راكليت',
                'ar'   => 'راكليت',
            ],
            'photo' => 'example/restaurant/ingredient/raclette.png',
        ]);

        $ingredientGruyere = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Gruyère',
                'en'   => 'Gruyere',
                'tnfr' => 'Gruyère',
                'tnar' => 'غرويير',
                'ar'   => 'غرويير',
            ],
            'photo' => 'example/restaurant/ingredient/gruyere.jpg',
        ]);

        $ingredientHalloumiGrille = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Halloumi grillé',
                'en'   => 'Grilled halloumi',
                'tnfr' => 'Halloumi mechwi',
                'tnar' => 'حلومي مشوي',
                'ar'   => 'حلومي مشوي',
            ],
            'photo' => 'example/restaurant/ingredient/halloumi.jpg',
        ]);

        $order = 1;
        $ingredientCategorySupplement->ingredients()->sync([
            $ingredientBacon->id          => [ 'order' => $order++, 'price' => 200, ],
            $ingredientPeperoni->id       => [ 'order' => $order++, 'price' => 200, ],
            $ingredientJambonBoeuf->id    => [ 'order' => $order++, 'price' => 200, ],
            $ingredientJambonDinde->id    => [ 'order' => $order++, 'price' => 200, ],
            $ingredientChampignon->id     => [ 'order' => $order++, 'price' => 200, ],
            $ingredientCheddar->id        => [ 'order' => $order++, 'price' => 200, ],
            $ingredientRaclette->id       => [ 'order' => $order++, 'price' => 200, ],
            $ingredientGruyere->id        => [ 'order' => $order++, 'price' => 200, ],
            $ingredientHalloumiGrille->id => [ 'order' => $order++, 'price' => 200, ],
        ]);
    }

    /**
     *
     */
    public function ingredientsForViande()
    {
        $ingredientCategoryViande = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Viande'")->first();

        $ingredientChawarma = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Chawarma',
                'en'   => 'Chawarma',
                'tnfr' => 'Chawarma',
                'tnar' => 'شاورما',
                'ar'   => 'شاورما',
            ],
            'photo' => 'example/restaurant/ingredient/chawarma.jpg',
        ]);

        $ingredientTenders = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Tenders',
                'en'   => 'Tenders',
                'tnfr' => 'Tenders',
                'tnar' => 'تندر',
                'ar'   => 'تندر',
            ],
            'photo' => 'example/restaurant/ingredient/tender.jpg',
        ]);

        $ingredientEscalope = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Escalope',
                'en'   => 'Escalope',
                'tnfr' => 'Escalope',
                'tnar' => 'اسكالوب',
                'ar'   => 'اسكالوب',
            ],
            'photo' => 'example/restaurant/ingredient/escalope_pizza.jpg',
        ]);

        $ingredientNuggets = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Nuggets',
                'en'   => 'Nuggets',
                'tnfr' => 'Nuggets',
                'tnar' => 'ناجت',
                'ar'   => 'ناجت',
            ],
            'photo' => 'example/restaurant/ingredient/nugget.jpg',
        ]);

        $ingredientChicken = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Chicken',
                'en'   => 'Chicken',
                'tnfr' => 'Chicken',
                'tnar' => 'دجاج',
                'ar'   => 'دجاج',
            ],
            'photo' => 'example/restaurant/ingredient/chicken.jpg',
        ]);

        $ingredientThon = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Thon',
                'en'   => 'Tuna',
                'tnfr' => 'Thon',
                'tnar' => 'تن',
                'ar'   => 'تن',
            ],
            'photo' => 'example/restaurant/ingredient/thon.jpg',
        ]);

        $ingredientFruitsDeMer = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Fruits de mer',
                'en'   => 'Seafood',
                'tnfr' => 'Fruits de mer',
                'tnar' => 'غلال البحر',
                'ar'   => 'غلال البحر',
            ],
            'photo' => 'example/restaurant/ingredient/fruits_de_mer.jpg',
        ]);

        $order = 1;
        $ingredientCategoryViande->ingredients()->sync([
            $ingredientChawarma->id    => [ 'order' => $order++ ],
            $ingredientTenders->id     => [ 'order' => $order++ ],
            $ingredientEscalope->id    => [ 'order' => $order++ ],
            $ingredientNuggets->id     => [ 'order' => $order++ ],
            $ingredientChicken->id     => [ 'order' => $order++ ],
            $ingredientThon->id        => [ 'order' => $order++ ],
            $ingredientFruitsDeMer->id => [ 'order' => $order++ ],
        ]);
    }

    /**
     *
     */
    public function ingredientsForPizzaSupplement()
    {
        // TODO: pizza supplement ingredientCategory doesn't exist
        $ingredientCategorySupplement = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first();

        $ingredientfromages = Ingredient::factory()->create([
            'name' => [
                'fr'   => '4 fromages',
                'en'   => '4 cheese',
                'tnfr' => '4 fromages',
                'tnar' => '4 فرماج',
                'ar'   => '4 أجبان',
            ],
            'photo' => 'example/restaurant/ingredient/cheese.jpg',
        ]);

        $ingredientFruitsDeMer = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Fruits de mer'")->first();
        $ingredientPeperoni = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Peperoni'")->first();
        $ingredientJambonBoeuf = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Jambon de boeuf'")->first();
        $ingredientJambonDinde = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Jambon de dinde'")->first();
        $ingredientChampignon = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Champignon'")->first();
        $ingredientThon = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Thon'")->first();
        $ingredientEscalope = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Escalope'")->first();
        $ingredientChawarma = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Chawarma'")->first();
        $ingredientChicken = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Chicken'")->first();

        $order = 1;
        $ingredientCategorySupplement->ingredients()->sync([
            $ingredientThon->id        => [ 'order' => $order++, 'price' => 2000, ],
            $ingredientfromages->id    => [ 'order' => $order++, 'price' => 3500, ],
            $ingredientFruitsDeMer->id => [ 'order' => $order++, 'price' => 4000, ],
            $ingredientPeperoni->id    => [ 'order' => $order++, 'price' => 2500, ],
            $ingredientJambonBoeuf->id => [ 'order' => $order++, 'price' => 2500, ],
            $ingredientJambonDinde->id => [ 'order' => $order++, 'price' => 2000, ],
            $ingredientChampignon->id  => [ 'order' => $order++, 'price' => 2000, ],
            $ingredientEscalope->id    => [ 'order' => $order++, 'price' => 2500, ],
            $ingredientChawarma->id    => [ 'order' => $order++, 'price' => 2500, ],
            $ingredientChicken->id     => [ 'order' => $order++, 'price' => 2500, ],
        ]);
    }
}
