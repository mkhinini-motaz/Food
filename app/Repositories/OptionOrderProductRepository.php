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
        $choiceOptionRelationData = \DB::table('choice_option')
            ->join('choices', 'choice_option.choice_id', '=', 'choices.id')
            ->whereIn('order_id', $orderIds)
            ->get();
        return self::groupOptionChoicesByProduct($choiceOptionRelationData);
    }

    /**
     * @param array|Collection $choiceOptionRelationData
     *
     * @return array
     */
    public static function groupOptionChoicesByProduct($choiceOptionRelationData)
    {
        $result = [];
        foreach ($choiceOptionRelationData as $choiceRelation) {
            $choiceId = $choiceRelation->choice_id;
            $optionId = $choiceRelation->option_id;
            if (isset($result[$choiceId])) {
                $result[$choiceId][$optionId] = self::dataForChoice($choiceRelation);
                continue;
            }
            $result[$choiceId] = [ $optionId => self::dataForChoice($choiceRelation) ];
        }

        return $result;
    }

    /**
     * @param array $choiceRelation
     *
     * @return array
     */
    public static function dataForChoice($choiceRelation)
    {
        $result = [];
        foreach (Option::ORDER_CHOICES_FIELDS as $field) {
            $result[$field] = $choiceRelation->$field;
        }
        return $result;
    }
}
