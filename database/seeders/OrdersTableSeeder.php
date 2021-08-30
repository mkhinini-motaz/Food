<?php

namespace Database\Seeders;

use App\Models\Option;
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
        $this->order1();
        $this->order2();
        $this->order3();
    }

    /**
     *
     */
    public function order1()
    {
        $order = Order::factory()->create([
            'shop_transporter_id' => 2,
            'client_id'     => 1,
            'promo_code_id' => 1,
            'delivery_latitude' => 35.7327203,
            'delivery_longitude' => 10.571216,
            'additional_note' => 'Bellahi fissa3 5ater jo3t hhh',
        ]);

        $order->products()->sync([
            1 => [ 'product_count' => 1, ],
            2 => [ 'product_count' => 3, ],
            3 => [ 'product_count' => 1, ],
        ]);

        $products = $order->products()->get();
        $optionSalad1Id = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Laitue'")->first()->id;
        $optionSalad2Id = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Oignon'")->first()->id;
        $optionSalad3Id = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Oignon sauté'")->first()->id;
        $optionHarissaId = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Harissa'")->first()->id;
        $optionMayonnaiseId = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Mayonnaise'")->first()->id;
        $optionFritesId = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Frites'")->first()->id;

        foreach ($products as $product) {
            if ($product->type !== Product::TYPE_WITH_OPTIONS) {
                continue;
            }

            $relationId = $product->pivot->id;
            \DB::table('option_order_product')->insert([
                'option_id'    => $optionSalad1Id,
                'order_product_id' => $relationId,
                'quantity' => 1,
            ]);
            \DB::table('option_order_product')->insert([
                'option_id'    => $optionSalad2Id,
                'order_product_id' => $relationId,
                'quantity' => 3,
            ]);
            \DB::table('option_order_product')->insert([
                'option_id'    => $optionSalad3Id,
                'order_product_id' => $relationId,
                'quantity' => 3,
            ]);
            \DB::table('option_order_product')->insert([
                'option_id'    => $optionHarissaId,
                'order_product_id' => $relationId,
                'quantity' => 3,
            ]);
            \DB::table('option_order_product')->insert([
                'option_id'    => $optionMayonnaiseId,
                'order_product_id' => $relationId,
                'quantity' => 3,
            ]);
            \DB::table('option_order_product')->insert([
                'option_id'    => $optionFritesId,
                'order_product_id' => $relationId,
            ]);
        }
    }

    /**
     *
     */
    public function order2()
    {
        $order = Order::factory()->create([
            'shop_transporter_id' => 3,
            'client_id' => 2,
            'delivery_latitude' => 35.742093,
            'delivery_longitude' => 10.584897,
            'additional_note' => 'Pizza 4 fromages men ghir roquefort',
        ]);

        $order->products()->sync([
            5 => [ 'product_count' => 1, ],
            15 => [ 'product_count' => 2, ],
        ]);

        $products = $order->products()->get();
        $optionSalad1Id = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Laitue'")->first()->id;
        $optionSalad2Id = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Oignon'")->first()->id;
        $optionSalad3Id = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Tomate'")->first()->id;
        $optionHarissaId = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Harissa'")->first()->id;
        $optionFritesId = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Frites'")->first()->id;

        foreach ($products as $product) {
            if ($product->type !== Product::TYPE_WITH_OPTIONS) {
                continue;
            }

            $relationId = $product->pivot->id;
            \DB::table('option_order_product')->insert([
                'option_id'    => $optionSalad1Id,
                'order_product_id' => $relationId,
                'quantity' => 1,
            ]);
            \DB::table('option_order_product')->insert([
                'option_id'    => $optionSalad2Id,
                'order_product_id' => $relationId,
                'quantity' => 1,
            ]);
            \DB::table('option_order_product')->insert([
                'option_id'    => $optionSalad3Id,
                'order_product_id' => $relationId,
                'quantity' => 1,
            ]);
            \DB::table('option_order_product')->insert([
                'option_id'    => $optionHarissaId,
                'order_product_id' => $relationId,
                'quantity' => 3,
            ]);
            \DB::table('option_order_product')->insert([
                'option_id'    => $optionFritesId,
                'order_product_id' => $relationId,
            ]);
        }
    }

    /**
     *
     */
    public function order3()
    {
        $order = Order::factory()->create([
            'shop_transporter_id' => 2,
            'client_id' => 3,
            'delivery_latitude' => 35.723200,
            'delivery_longitude' => 10.587157,
            'additional_note' => 'Chwaya bsal fi wost baguette farcie',
        ]);

        $order->products()->sync([
            7  => [ 'product_count' => 2, ],
            25 => [ 'product_count' => 1, ],
            29 => [ 'product_count' => 1, ],
            40 => [ 'product_count' => 5, ],
        ]);

        $products = $order->products()->get();
        $optionSalad1Id = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Laitue'")->first()->id;
        $optionSalad2Id = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Oignon'")->first()->id;
        $optionSalad3Id = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Tomate'")->first()->id;
        $optionHarissaId = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Harissa'")->first()->id;
        $optionMayonnaiseId = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Mayonnaise'")->first()->id;
        $optionFritesId = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Frites'")->first()->id;

        foreach ($products as $product) {
            if ($product->type !== Product::TYPE_WITH_OPTIONS) {
                continue;
            }

            $relationId = $product->pivot->id;
            \DB::table('option_order_product')->insert([
                'option_id'    => $optionSalad1Id,
                'order_product_id' => $relationId,
                'quantity' => 1,
            ]);
            \DB::table('option_order_product')->insert([
                'option_id'    => $optionSalad2Id,
                'order_product_id' => $relationId,
                'quantity' => 3,
            ]);
            \DB::table('option_order_product')->insert([
                'option_id'    => $optionSalad3Id,
                'order_product_id' => $relationId,
                'quantity' => 3,
            ]);
            \DB::table('option_order_product')->insert([
                'option_id'    => $optionHarissaId,
                'order_product_id' => $relationId,
                'quantity' => 3,
            ]);
            \DB::table('option_order_product')->insert([
                'option_id'    => $optionMayonnaiseId,
                'order_product_id' => $relationId,
                'quantity' => 3,
            ]);
            \DB::table('option_order_product')->insert([
                'option_id'    => $optionFritesId,
                'order_product_id' => $relationId,
            ]);
        }
    }
}
