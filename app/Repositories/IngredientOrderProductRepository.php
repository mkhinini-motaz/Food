<?php

namespace App\Repositories;

use App\Models\Ingredient;

use Illuminate\Support\Collection;

class IngredientOrderProductRepository
{
    /**
     * @param array|Collection $orderIds
     *
     * @return array [ 'order_product_id' => [ 'ingredient_id' => [ [ quantity => ... ], ], ], ]
     */
    public static function ingredientChoicesForOrders($orderIds)
    {
        $choices = \DB::table('ingredient_order_product')
            ->join('order_product', 'ingredient_order_product.order_product_id', '=', 'order_product.id')
            ->whereIn('order_id', $orderIds)
            ->get();

        return self::groupIngredientChoicesByProduct($choices);
    }

    /**
     * @param array|Collection $choices
     *
     * @return array
     */
    public static function groupIngredientChoicesByProduct($choices)
    {
        $result = [];
        foreach ($choices as $choice) {
            if (isset($result[$choice->order_product_id])) {
                $result[$choice->order_product_id][$choice->ingredient_id] = self::dataForChoice($choice);
                continue;
            }
            $result[$choice->order_product_id] = [ $choice->ingredient_id => self::dataForChoice($choice) ];
        }

        return $result;
    }

    /**
     * @param array $choice
     *
     * @return array
     */
    public static function dataForChoice($choice)
    {
        $result = [];
        foreach (Ingredient::ORDER_CHOICES_FIELDS as $field) {
            $result[$field] = $choice->$field;
        }
        return $result;
    }
}
