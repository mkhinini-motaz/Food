<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Order;

use App\Models\Product;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $order = Order::factory()->create();

        $order->products()->sync([
            1 => [ 'product_count' => 1, ],
            2 => [ 'product_count' => 3, ],
            3 => [ 'product_count' => 1, ],
        ]);

        $products = $order->products()->get();
        $ingredientSalad1Id = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Salade concombre'")->first()->id;
        $ingredientSalad2Id = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Salade choux rouge'")->first()->id;
        $ingredientHarissaId = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Harissa'")->first()->id;
        $ingredientMayonnaiseId = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Mayonnaise'")->first()->id;
        $ingredientFritesId = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Frites'")->first()->id;

        foreach ($products as $product) {
            if ($product->type !== Product::TYPE_WITH_INGREDIENTS) {
                continue;
            }

            $relationId = $product->pivot->id;
            \DB::table('ingredient_order_product')->insert([
                'ingredient_id'    => $ingredientSalad1Id,
                'order_product_id' => $relationId,
                'quantity' => 1,
            ]);
            \DB::table('ingredient_order_product')->insert([
                'ingredient_id'    => $ingredientSalad2Id,
                'order_product_id' => $relationId,
                'quantity' => 3,
            ]);
            \DB::table('ingredient_order_product')->insert([
                'ingredient_id'    => $ingredientHarissaId,
                'order_product_id' => $relationId,
                'quantity' => 3,
            ]);
            \DB::table('ingredient_order_product')->insert([
                'ingredient_id'    => $ingredientMayonnaiseId,
                'order_product_id' => $relationId,
                'quantity' => 3,
            ]);
            \DB::table('ingredient_order_product')->insert([
                'ingredient_id'    => $ingredientFritesId,
                'order_product_id' => $relationId,
            ]);
        }
    }
}
