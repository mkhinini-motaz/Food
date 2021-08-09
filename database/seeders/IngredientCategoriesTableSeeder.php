<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\IngredientCategory;

use Illuminate\Database\Seeder;

class IngredientCategoriesTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $this->create();

        $this->boxCategoryAttach();
        $this->platCategoryAttach();
        $this->sandwichCategoryAttach();
        $this->tacosCategoryAttach();
//        $this->pizza4ChoicesCategoryAttach();
        $this->makloubCategoryAttach();
    }

    /**
     *
     */
    public function create()
    {
        IngredientCategory::factory()->create([
            'name' => [
                'fr'   => 'Riz',
                'en'   => 'Rice',
                'tnar' => 'روز',
                'tnfr' => 'Roz',
                'ar'   => 'أرز',
            ],
            'photo' => 'example/restaurant/ingredientCategory/rice.jpg',
            'shop_id' => 1,
        ]);

        IngredientCategory::factory()->create([
            'name' => [
                'fr'   => 'Salade',
                'en'   => 'Salad',
                'tnar' => 'سلاطة',
                'tnfr' => 'Slata',
                'ar'   => 'سلطة',
            ],
            'photo' => 'example/restaurant/ingredientCategory/salad.jpg',
            'shop_id' => 1,
        ]);

        IngredientCategory::factory()->create([
            'name' => [
                'fr'   => 'Pomme de terre',
                'en'   => 'Potato',
                'tnar' => 'بطاطا',
                'tnfr' => 'Batata',
                'ar'   => 'بطاطس',
            ],
            'photo' => 'example/restaurant/ingredientCategory/kartoffeln.jpg',
            'shop_id' => 1,
        ]);

        IngredientCategory::factory()->create([
            'name' => [
                'fr'   => 'Sauce',
                'en'   => 'Sauce',
                'tnar' => 'سوس',
                'tnfr' => 'Sauce',
                'ar'   => 'صلصة',
            ],
            'photo' => 'example/restaurant/ingredientCategory/sauce.jpg',
            'shop_id' => 1,
        ]);

        IngredientCategory::factory()->create([
            'name' => [
                'fr'   => 'Sauce pizza',
                'en'   => 'Pizza Sauce',
                'tnar' => 'سوس بيتزا',
                'tnfr' => 'Sauce pizza',
                'ar'   => 'صلصة البيتزا',
            ],
            'photo' => 'example/restaurant/ingredientCategory/sauce_pizza.jpg',
            'shop_id' => 1,
        ]);

        IngredientCategory::factory()->create([
            'name' => [
                'fr'   => 'Sauce fromagère',
                'en'   => 'Cheese sauce',
                'tnfr' => 'Sauce fromagère',
                'tnar' => 'سوس فرماج',
                'ar'   => 'صلصة الجبنة',
            ],
            'photo' => 'example/restaurant/ingredientCategory/sauce_fromage.png',
            'shop_id' => 1,
        ]);

        IngredientCategory::factory()->create([
            'name' => [
                'fr'   => 'Viande',
                'en'   => 'Meat',
                'tnfr' => 'Viande',
                'tnar' => 'لحم',
                'ar'   => 'لحم',
            ],
            'photo' => 'example/restaurant/ingredientCategory/meat.png',
            'shop_id' => 1,
        ]);

        IngredientCategory::factory()->create([
            'name' => [
                'fr'   => 'Supplément',
                'en'   => 'Supplement',
                'tnar' => 'اضافات',
                'tnfr' => 'Supplément',
                'ar'   => 'اضافات',
            ],
            'photo' => 'example/restaurant/ingredientCategory/supplement.jpg',
            'shop_id' => 1,
        ]);
    }

    /**
     *
     */
    public function boxCategoryAttach()
    {
        $order = 1;
        $ingredientCategoryViande = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Viande'")->first();
        $ingredientCategoryFromagereSauce = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce fromagère'")->first();
        $ingredientCategorySauce = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")->first();
        $ingredientCategorySupplement = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first();

        $boxSimple = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Box simple'")->first();

        $boxSimple->ingredientCategories()->sync([
            $ingredientCategoryViande->id => [ 'order' => $order++, 'min_ingredients' => 1, 'max_ingredients' => 1, ],
            $ingredientCategoryFromagereSauce->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 1, ],
            $ingredientCategorySauce->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 3, 'ingredients_are_quantifiable' => 1, ],
            $ingredientCategorySupplement->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 4, 'ingredients_are_billable' => 1, ],
        ]);

        $boxBrochette = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Box brochette'")->first();

        $boxBrochette->ingredientCategories()->sync([
            $ingredientCategoryViande->id => [ 'order' => $order++, 'min_ingredients' => 1, 'max_ingredients' => 1, ],
            $ingredientCategoryFromagereSauce->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 1, ],
            $ingredientCategorySauce->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 3, 'ingredients_are_quantifiable' => 1, ],
            $ingredientCategorySupplement->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 4, 'ingredients_are_billable' => 1, ],
        ]);

        $boxMixt = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Box Mixte'")->first();

        $boxMixt->ingredientCategories()->sync([
            $ingredientCategoryViande->id => [ 'order' => $order++, 'min_ingredients' => 1, 'max_ingredients' => 1, ],
            $ingredientCategoryFromagereSauce->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 1, ],
            $ingredientCategorySauce->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 3, 'ingredients_are_quantifiable' => 1, ],
            $ingredientCategorySupplement->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 4, 'ingredients_are_billable' => 1, ],
        ]);

        $boxGhost = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Box ghost'")->first();

        $boxGhost->ingredientCategories()->sync([
            $ingredientCategoryViande->id => [ 'order' => $order++, 'min_ingredients' => 1, 'max_ingredients' => 1, ],
            $ingredientCategoryFromagereSauce->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 1, ],
            $ingredientCategorySauce->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 3, 'ingredients_are_quantifiable' => 1, ],
            $ingredientCategorySupplement->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 4, 'ingredients_are_billable' => 1, ],
        ]);
    }

    /**
     *
     */
    public function platCategoryAttach()
    {
        $order = 1;
        $ingredientCategorySauce = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")->first();
        $ingredientCategoryRice = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Riz'")->first();
        $ingredientCategorySalad = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Salade'")->first();
        $ingredientCategoryPotatoes = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pomme de terre'")->first();

        $platProducts = Product::where('category_id', '=', 1)->get();
        foreach ($platProducts as $product) {
            $product->ingredientCategories()->sync([
                $ingredientCategoryRice->id     => [ 'order' => $order++, ],
                $ingredientCategorySalad->id    => [ 'order' => $order++, ],
                $ingredientCategoryPotatoes->id => [ 'order' => $order++, ],
                $ingredientCategorySauce->id    => [ 'order' => $order++, 'max_ingredients' => 3, ]
            ]);
        }
    }

    /**
     *
     */
    public function sandwichCategoryAttach()
    {
        $order = 1;
        $ingredientCategorySauce = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")->first();
        $ingredientCategorySupplement = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first();
        $ingredientCategorySalad = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Salade'")->first();
        $ingredientCategoryPotatoes = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pomme de terre'")->first();

        $sandwichProducts = Product::where('category_id', '=', 3)->get();

        foreach ($sandwichProducts as $product) {
            $product->ingredientCategories()->sync([
                $ingredientCategorySauce->id      => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 3, 'ingredients_are_quantifiable' => 1, ],
                $ingredientCategorySalad->id      => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 4, 'ingredients_are_quantifiable' => 1, ],
                $ingredientCategoryPotatoes->id   => [ 'order' => $order++, ],
                $ingredientCategorySupplement->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 4, 'ingredients_are_billable' => 1, ],
            ]);
        }
    }

    /**
     *
     */
    public function tacosCategoryAttach()
    {
        $order = 1;
        $ingredientCategoryViande = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Viande'")->first();
        $ingredientCategoryFromagereSauce = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce fromagère'")->first();
        $ingredientCategorySauce = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")->first();
        $ingredientCategorySupplement = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first();

        $tacosS = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Tacos S 1 viande'")->first();

        $tacosS->ingredientCategories()->sync([
            $ingredientCategoryViande->id => [ 'order' => $order++, 'min_ingredients' => 1, 'max_ingredients' => 1, ],
            $ingredientCategoryFromagereSauce->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 1, ],
            $ingredientCategorySauce->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 3, 'ingredients_are_quantifiable' => 1, ],
            $ingredientCategorySupplement->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 4, 'ingredients_are_billable' => 1, ],
        ]);

        $tacosM = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Tacos M 2 viandes'")->first();

        $order = 1;
        $tacosM->ingredientCategories()->sync([
            $ingredientCategoryViande->id => [ 'order' => $order++, 'min_ingredients' => 2, 'max_ingredients' => 2, ],
            $ingredientCategoryFromagereSauce->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 1, ],
            $ingredientCategorySauce->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 3, 'ingredients_are_quantifiable' => 1, ],
            $ingredientCategorySupplement->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 4, 'ingredients_are_billable' => 1, ],
        ]);

        $tacosL = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Tacos L 3 viandes'")->first();

        $order = 1;
        $tacosL->ingredientCategories()->sync([
            $ingredientCategoryViande->id => [ 'order' => $order++, 'min_ingredients' => 3, 'max_ingredients' => 3, ],
            $ingredientCategoryFromagereSauce->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 1, ],
            $ingredientCategorySauce->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 3, 'ingredients_are_quantifiable' => 1, ],
            $ingredientCategorySupplement->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 5, 'ingredients_are_billable' => 1, ],
        ]);
    }

    /**
     *
     */
    public function makloubCategoryAttach()
    {
        $order = 1;
        $ingredientCategorySauce = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")->first();
        $ingredientCategorySupplement = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first();
        $ingredientCategorySalad = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Salade'")->first();
        $ingredientCategoryPotatoes = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pomme de terre'")->first();

        $makloubProducts = Product::where('category_id', '=', 4)->get();

        foreach ($makloubProducts as $product) {
            $product->ingredientCategories()->sync([
                $ingredientCategorySauce->id      => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 3, 'ingredients_are_quantifiable' => 1, ],
                $ingredientCategorySalad->id      => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 3, 'ingredients_are_quantifiable' => 1, ],
                $ingredientCategoryPotatoes->id   => [ 'order' => $order++, ],
                $ingredientCategorySupplement->id => [ 'order' => $order++, 'min_ingredients' => 0, 'max_ingredients' => 4, 'ingredients_are_billable' => 1, ],
            ]);
        }
    }

    /**
     *
     */
    public function pizza4ChoicesCategoryAttach()
    {
        $order = 1;
        $ingredientCategorySaucePizza = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce pizza'")->first();
        $ingredientCategorySupplement = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first();

        $quatreGoutPizzaProduct = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pizza au choix'")->first();
        $quatreGoutPizzaProduct->ingredientCategories()->sync([
            $ingredientCategorySaucePizza->id => [ 'order' => $order++ ],
            $ingredientCategorySupplement->id => [ 'order' => $order++, 'min_ingredients' => 2, 'max_ingredients' => 4, ],
        ]);
    }
}
