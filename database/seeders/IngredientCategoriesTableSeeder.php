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
        $ingredientCategoryRice = IngredientCategory::factory()->create([
            'name' => [
                'fr' => 'Riz',
                'en' => 'Rice',
                'tn' => 'Roz',
                'ar' => 'أرز',
            ],
            'photo' => 'example/restaurant/ingredientCategory/rice.jpg',
        ]);

        $ingredientCategorySalad = IngredientCategory::factory()->create([
            'name' => [
                'fr' => 'Salade',
                'en' => 'Salad',
                'tn' => 'Slata',
                'ar' => 'سلطة',
            ],
            'photo' => 'example/restaurant/ingredientCategory/salad.jpg',
        ]);

        $ingredientCategoryPotatoes = IngredientCategory::factory()->create([
            'name' => [
                'fr' => 'Pomme de terre',
                'en' => 'Potato',
                'tn' => 'Batata',
                'ar' => 'بطاطس',
            ],
            'photo' => 'example/restaurant/ingredientCategory/kartoffeln.jpg',
        ]);

        $ingredientCategorySauce = IngredientCategory::factory()->create([
            'name' => [
                'fr' => 'Sauce',
                'en' => 'Sauce',
                'tn' => 'Sauce',
                'ar' => 'صلصة',
            ],
            'photo' => 'example/restaurant/ingredientCategory/sauce.jpg',
        ]);

        $ingredientCategorySaucePizza = IngredientCategory::factory()->create([
            'name' => [
                'fr' => 'Sauce pizza',
                'en' => 'Pizza Sauce',
                'tn' => 'Sauce pizza',
                'ar' => 'صلصة البيتزا',
            ],
            'photo' => 'example/restaurant/ingredientCategory/sauce_pizza.jpg',
        ]);

        $ingredientCategorySupplement = IngredientCategory::factory()->create([
            'name' => [
                'fr' => 'Supplément',
                'en' => 'Supplement',
                'tn' => 'Supplément',
                'ar' => 'اضافات',
            ],
            'photo' => 'example/restaurant/ingredientCategory/supplement.jpg',
        ]);

        $platProducts = Product::where('category_id', '=', 1)->get();
        foreach ($platProducts as $product) {
            $product->ingredientCategories()->sync([
                $ingredientCategoryRice->id     => [ 'order' => 1, ],
                $ingredientCategorySalad->id    => [ 'order' => 2, ],
                $ingredientCategoryPotatoes->id => [ 'order' => 3, ],
                $ingredientCategorySauce->id    => [ 'order' => 4, 'max_ingredients' => 3, ]
            ]);
        }

        $sandwichProducts = Product::where('category_id', '=', 2)->get();
        foreach ($sandwichProducts as $product) {
            $product->ingredientCategories()->sync([
                $ingredientCategorySauce->id      => [ 'order' => 1, 'min_ingredients' => 0, 'max_ingredients' => 3, 'ingredients_are_quantifiable' => 1, ],
                $ingredientCategorySalad->id      => [ 'order' => 2, 'min_ingredients' => 0, 'max_ingredients' => 3, 'ingredients_are_quantifiable' => 1, ],
                $ingredientCategoryPotatoes->id   => [ 'order' => 3, ],
//                $ingredientCategorySupplement->id => [ 'order' => 4, 'min_ingredients' => 0, 'max_ingredients' => 4, 'ingredients_are_billable' => 1, ],

            ]);
        }

/*
        $quatreGoutPizzaProduct = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pizza au choix'")->first();
        $quatreGoutPizzaProduct->ingredientCategories()->sync([
            $ingredientCategorySaucePizza->id => [ 'order' => 1 ],
            $ingredientCategorySupplement->id => [ 'order' => 2, 'min_ingredients' => 2, 'max_ingredients' => 4, ],
        ]);
*/

        $makloubProducts = Product::where('category_id', '=', 3)->get();
        foreach ($makloubProducts as $product) {
            $product->ingredientCategories()->sync([
                $ingredientCategorySauce->id      => [ 'order' => 1, 'min_ingredients' => 0, 'max_ingredients' => 3, 'ingredients_are_quantifiable' => 1, ],
                $ingredientCategorySalad->id      => [ 'order' => 2, 'min_ingredients' => 0, 'max_ingredients' => 3, 'ingredients_are_quantifiable' => 1, ],
                $ingredientCategoryPotatoes->id   => [ 'order' => 3, ],

            ]);
        }
    }
}
