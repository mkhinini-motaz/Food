<?php

namespace App\Repositories;

use App\Models\Option;

use Illuminate\Support\Collection;

class OptionOrderProductRepository
{
    /**
     * @param array|Collection $orderIds
     *
     * @return array [ 'order_product_id' => [ 'option_id' => [ [ quantity => ... ], ], ], ]
     */
    public static function optionChoicesForOrders($orderIds)
    {
        $choices = \DB::table('option_order_product')
            ->join('order_product', 'option_order_product.order_product_id', '=', 'order_product.id')
            ->whereIn('order_id', $orderIds)
            ->get();

        return self::groupOptionChoicesByProduct($choices);
    }

    /**
     * @param array|Collection $choices
     *
     * @return array
     */
    public static function groupOptionChoicesByProduct($choices)
    {
        $result = [];
        foreach ($choices as $choice) {
            if (isset($result[$choice->order_product_id])) {
                $result[$choice->order_product_id][$choice->option_id] = self::dataForChoice($choice);
                continue;
            }
            $result[$choice->order_product_id] = [ $choice->option_id => self::dataForChoice($choice) ];
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
        foreach (Option::ORDER_CHOICES_FIELDS as $field) {
            $result[$field] = $choice->$field;
        }
        return $result;
    }
}
