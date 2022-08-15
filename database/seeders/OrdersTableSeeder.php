<?php

namespace Database\Seeders;

use App\Models\Choice;
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
        /** @var Order $order */
        $order = Order::factory()->create([
            'shop_transporter_id' => 1,
            'type' => Order::TYPE_DELIVERY,
            'promo_code_id' => 1,
            'delivery_latitude' => 35.7327203,
            'delivery_longitude' => 10.571216,
            'additional_note' => 'Bellahi fissa3 5ater jo3t hhh',
            'associated_phone' => '+21623456789',
            'created_at' => time() + 40,
        ]);

        \DB::table('choices')->insert([
            [
                'product_id'    => 1,
                'order_id'      => $order->id,
                'product_count' => 1,
                'created_at'    => time(),
                'updated_at'    => time(),
            ],
            [
                'product_id'    => 2,
                'order_id'      => $order->id,
                'product_count' => 3,
                'created_at'    => time(),
                'updated_at'    => time(),
            ],
            [
                'product_id'    => 3,
                'order_id'      => $order->id,
                'product_count' => 1,
                'created_at'    => time(),
                'updated_at'    => time(),
            ],
        ]);
        $choices = $order->choices()
            ->whereHas('product', function ($query) {
                $query->where('type', '=', Product::TYPE_WITH_OPTIONS);
            })
            ->get();

        $optionSalad1Id = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Laitue'")->first()->id;
        $optionSalad2Id = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Oignon'")->first()->id;
        $optionSalad3Id = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Oignon sauté'")->first()->id;
        $optionHarissaId = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Harissa'")->first()->id;
        $optionMayonnaiseId = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Mayonnaise'")->first()->id;
        $optionFritesId = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Frites'")->first()->id;

        foreach ($choices as $choice) {
            $choiceId = $choice->id;
            \DB::table('choice_option')->insert([
                [
                    'option_id' => $optionSalad1Id,
                    'choice_id' => $choiceId,
                    'quantity'  => 1,
                ],
                [
                    'option_id' => $optionSalad2Id,
                    'choice_id' => $choiceId,
                    'quantity'  => 3,
                ],
                [
                    'option_id' => $optionSalad3Id,
                    'choice_id' => $choiceId,
                    'quantity'  => 3,
                ],
                [
                    'option_id' => $optionHarissaId,
                    'choice_id' => $choiceId,
                    'quantity'  => 3,
                ],
                [
                    'option_id' => $optionMayonnaiseId,
                    'choice_id' => $choiceId,
                    'quantity'  => 3,
                ],
                [
                    'option_id' => $optionFritesId,
                    'choice_id' => $choiceId,
                    'quantity'  => null,
                ]
            ]);
        }
    }

    /**
     *
     */
    public function order2()
    {
        /** @var Order $order */
        $order = Order::factory()->create([
            'shop_transporter_id' => 1,
            'type' => Order::TYPE_DELIVERY,
            'delivery_latitude' => 35.742093,
            'delivery_longitude' => 10.584897,
            'additional_note' => 'Pizza 4 fromages men ghir roquefort',
            'associated_phone' => '+21699999999',
            'created_at' => time() + 20,
        ]);

        \DB::table('choices')->insert([
            [
                'product_id'    => 5,
                'order_id'      => $order->id,
                'product_count' => 1,
                'created_at'    => time(),
                'updated_at'    => time(),
            ],
            [
                'product_id'    => 15,
                'order_id'      => $order->id,
                'product_count' => 2,
                'created_at'    => time(),
                'updated_at'    => time(),
            ],
        ]);
        $choices = $order->choices()
            ->whereHas('product', function ($query) {
                $query->where('type', '=', Product::TYPE_WITH_OPTIONS);
            })
            ->get();

        $optionSalad1Id = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Laitue'")->first()->id;
        $optionSalad2Id = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Oignon'")->first()->id;
        $optionSalad3Id = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Tomate'")->first()->id;
        $optionHarissaId = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Harissa'")->first()->id;
        $optionFritesId = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Frites'")->first()->id;

        foreach ($choices as $choice) {
            $choiceId = $choice->id;
            \DB::table('choice_option')->insert([
                [
                    'option_id'    => $optionSalad1Id,
                    'choice_id' => $choiceId,
                    'quantity' => 1,
                ],
                [
                    'option_id'    => $optionSalad2Id,
                    'choice_id' => $choiceId,
                    'quantity' => 1,
                ],
                [
                    'option_id'    => $optionSalad3Id,
                    'choice_id' => $choiceId,
                    'quantity' => 1,
                ],
                [
                    'option_id'    => $optionHarissaId,
                    'choice_id' => $choiceId,
                    'quantity' => 3,
                ],
                [
                    'option_id'    => $optionFritesId,
                    'choice_id' => $choiceId,
                    'quantity'  => null,
                ],
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
            'type' => Order::TYPE_DELIVERY,
            'delivery_latitude' => 35.723200,
            'delivery_longitude' => 10.587157,
            'additional_note' => 'Chwaya bsal fi wost baguette farcie',
            'created_at' => time() - 10,
        ]);

        \DB::table('choices')->insert([
            [
                'product_id'    => 7,
                'order_id'      => $order->id,
                'product_count' => 2,
                'created_at'    => time(),
                'updated_at'    => time(),
            ],
            [
                'product_id'    => 25,
                'order_id'      => $order->id,
                'product_count' => 1,
                'created_at'    => time(),
                'updated_at'    => time(),
            ],
            [
                'product_id'    => 15,
                'order_id'      => $order->id,
                'product_count' => 2,
                'created_at'    => time(),
                'updated_at'    => time(),
            ],
            [
                'product_id'    => 29,
                'order_id'      => $order->id,
                'product_count' => 1,
                'created_at'    => time(),
                'updated_at'    => time(),
            ],
        ]);
        $choices = $order->choices()
            ->whereHas('product', function ($query) {
                $query->where('type', '=', Product::TYPE_WITH_OPTIONS);
            })
            ->get();

        $optionSalad1Id = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Laitue'")->first()->id;
        $optionSalad2Id = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Oignon'")->first()->id;
        $optionSalad3Id = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Tomate'")->first()->id;
        $optionHarissaId = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Harissa'")->first()->id;
        $optionMayonnaiseId = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Mayonnaise'")->first()->id;

        foreach ($choices as $choice) {
            $choiceId = $choice->id;
            \DB::table('choice_option')->insert([
                [
                    'option_id'    => $optionSalad1Id,
                    'choice_id' => $choiceId,
                    'quantity' => 1,
                ],
                [
                    'option_id'    => $optionSalad2Id,
                    'choice_id' => $choiceId,
                    'quantity' => 3,
                ],
                [
                    'option_id'    => $optionSalad3Id,
                    'choice_id' => $choiceId,
                    'quantity' => 3,
                ],
                [
                    'option_id'    => $optionHarissaId,
                    'choice_id' => $choiceId,
                    'quantity' => 3,
                ],
                [
                    'option_id'    => $optionMayonnaiseId,
                    'choice_id' => $choiceId,
                    'quantity' => 3,
                ],
            ]);
        }
    }
}
