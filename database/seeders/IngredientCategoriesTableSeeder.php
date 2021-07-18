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
                'fr' => 'Riz',
                'en' => 'Rice',
                'tn' => 'Roz',
                'ar' => 'أرز',
            ],
            'photo' => 'example/restaurant/ingredientCategory/rice.jpg',
            'shop_id' => 1,
        ]);

        IngredientCategory::factory()->create([
            'name' => [
                'fr' => 'Salade',
                'en' => 'Salad',
                'tn' => 'Slata',
                'ar' => 'سلطة',
            ],
            'photo' => 'example/restaurant/ingredientCategory/salad.jpg',
            'shop_id' => 1,
        ]);

        IngredientCategory::factory()->create([
            'name' => [
                'fr' => 'Pomme de terre',
                'en' => 'Potato',
                'tn' => 'Batata',
                'ar' => 'بطاطس',
            ],
            'photo' => 'example/restaurant/ingredientCategory/kartoffeln.jpg',
            'shop_id' => 1,
        ]);

        IngredientCategory::factory()->create([
            'name' => [
                'fr' => 'Sauce',
                'en' => 'Sauce',
                'tn' => 'Sauce',
                'ar' => 'صلصة',
            ],
            'photo' => 'example/restaurant/ingredientCategory/sauce.jpg',
            'shop_id' => 1,
        ]);

        IngredientCategory::factory()->create([
            'name' => [
                'fr' => 'Sauce pizza',
                'en' => 'Pizza Sauce',
                'tn' => 'Sauce pizza',
                'ar' => 'صلصة البيتزا',
            ],
            'photo' => 'example/restaurant/ingredientCategory/sauce_pizza.jpg',
            'shop_id' => 1,
        ]);

        IngredientCategory::factory()->create([
            'name' => [
                'fr' => 'Sauce fromagère',
                'en' => 'Cheese sauce',
                'tn' => 'Sauce fromagère',
                'ar' => 'صلصة الجبنة',
            ],
            'photo' => 'example/restaurant/ingredientCategory/sauce_fromage.png',
            'shop_id' => 1,
        ]);

        IngredientCategory::factory()->create([
            'name' => [
                'fr' => 'Viande',
                'en' => 'Meat',
                'tn' => 'Viande',
                'ar' => 'لحم',
            ],
            'photo' => 'example/restaurant/ingredientCategory/meat.png',
            'shop_id' => 1,
        ]);

        IngredientCategory::factory()->create([
            'name' => [
                'fr' => 'Supplément',
                'en' => 'Supplement',
                'tn' => 'Supplément',
                'ar' => 'اضافات',
            ],
            'photo' => 'example/restaurant/ingredientCategory/supplement.jpg',
            'shop_id' => 1,
        ]);
    }

    /**
     *
     */
    public function platCategoryAttach()
    {
        $ingredientCategorySauce = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")->first();
        $ingredientCategoryRice = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Riz'")->first();
        $ingredientCategorySalad = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Salade'")->first();
        $ingredientCategoryPotatoes = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pomme de terre'")->first();

        $platProducts = Product::where('category_id', '=', 1)->get();
        foreach ($platProducts as $product) {
            $product->ingredientCategories()->sync([
                $ingredientCategoryRice->id     => [ 'order' => 1, ],
                $ingredientCategorySalad->id    => [ 'order' => 2, ],
                $ingredientCategoryPotatoes->id => [ 'order' => 3, ],
                $ingredientCategorySauce->id    => [ 'order' => 4, 'max_ingredients' => 3, ]
            ]);
        }
    }

    public function sandwichCategoryAttach()
    {
        $ingredientCategorySauce = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")->first();
        $ingredientCategorySupplement = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first();
        $ingredientCategorySalad = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Salade'")->first();
        $ingredientCategoryPotatoes = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pomme de terre'")->first();

        $sandwichProducts = Product::where('category_id', '=', 3)->get();

        foreach ($sandwichProducts as $product) {
            $product->ingredientCategories()->sync([
                $ingredientCategorySauce->id      => [ 'order' => 1, 'min_ingredients' => 0, 'max_ingredients' => 3, 'ingredients_are_quantifiable' => 1, ],
                $ingredientCategorySalad->id      => [ 'order' => 2, 'min_ingredients' => 0, 'max_ingredients' => 3, 'ingredients_are_quantifiable' => 1, ],
                $ingredientCategoryPotatoes->id   => [ 'order' => 3, ],
                $ingredientCategorySupplement->id => [ 'order' => 4, 'min_ingredients' => 0, 'max_ingredients' => 4, 'ingredients_are_billable' => 1, ],
            ]);
        }
    }

    /**
     *
     */
    public function tacosCategoryAttach()
    {
        $ingredientCategoryViande = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Viande'")->first();
        $ingredientCategoryFromagereSauce = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce fromagère'")->first();
        $ingredientCategorySauce = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")->first();
        $ingredientCategorySupplement = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first();

        $tacosS = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Tacos S 1 viande'")->first();

        $tacosS->ingredientCategories()->sync([
            $ingredientCategoryViande->id => [ 'order' => 1, 'min_ingredients' => 1, 'max_ingredients' => 1, ],
            $ingredientCategoryFromagereSauce->id => [ 'order' => 2, 'min_ingredients' => 0, 'max_ingredients' => 1, ],
            $ingredientCategorySauce->id => [ 'order' => 3, 'min_ingredients' => 1, 'max_ingredients' => 3, ],
            $ingredientCategorySupplement->id => [ 'order' => 4, 'min_ingredients' => 0, 'max_ingredients' => 4, 'ingredients_are_billable' => 1, ],
        ]);

        $tacosM = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Tacos M 2 viandes'")->first();

        $tacosM->ingredientCategories()->sync([
            $ingredientCategoryViande->id => [ 'order' => 1, 'min_ingredients' => 2, 'max_ingredients' => 2, ],
            $ingredientCategorySauce->id => [ 'order' => 2, 'min_ingredients' => 1, 'max_ingredients' => 3, ],
            $ingredientCategorySupplement->id => [ 'order' => 3, 'min_ingredients' => 0, 'max_ingredients' => 4, 'ingredients_are_billable' => 1, ],
        ]);

        $tacosL = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Tacos L 3 viandes'")->first();

        $tacosL->ingredientCategories()->sync([
            $ingredientCategoryViande->id => [ 'order' => 1, 'min_ingredients' => 3, 'max_ingredients' => 3, ],
            $ingredientCategorySauce->id => [ 'order' => 2, 'min_ingredients' => 1, 'max_ingredients' => 3, ],
            $ingredientCategorySupplement->id => [ 'order' => 3, 'min_ingredients' => 0, 'max_ingredients' => 5, 'ingredients_are_billable' => 1, ],
        ]);
    }

    /**
     *
     */
    public function makloubCategoryAttach()
    {
        $ingredientCategorySauce = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")->first();
        $ingredientCategorySupplement = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first();
        $ingredientCategorySalad = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Salade'")->first();
        $ingredientCategoryPotatoes = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pomme de terre'")->first();

        $makloubProducts = Product::where('category_id', '=', 4)->get();

        foreach ($makloubProducts as $product) {
            $product->ingredientCategories()->sync([
                $ingredientCategorySauce->id      => [ 'order' => 1, 'min_ingredients' => 0, 'max_ingredients' => 3, 'ingredients_are_quantifiable' => 1, ],
                $ingredientCategorySalad->id      => [ 'order' => 2, 'min_ingredients' => 0, 'max_ingredients' => 3, 'ingredients_are_quantifiable' => 1, ],
                $ingredientCategoryPotatoes->id   => [ 'order' => 3, ],
                $ingredientCategorySupplement->id => [ 'order' => 4, 'min_ingredients' => 0, 'max_ingredients' => 4, 'ingredients_are_billable' => 1, ],
            ]);
        }
    }

    /**
     *
     */
    public function pizza4ChoicesCategoryAttach()
    {
        $ingredientCategorySaucePizza = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce pizza'")->first();
        $ingredientCategorySupplement = IngredientCategory::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first();

        $quatreGoutPizzaProduct = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pizza au choix'")->first();
        $quatreGoutPizzaProduct->ingredientCategories()->sync([
            $ingredientCategorySaucePizza->id => [ 'order' => 1 ],
            $ingredientCategorySupplement->id => [ 'order' => 2, 'min_ingredients' => 2, 'max_ingredients' => 4, ],
        ]);
    }
}
