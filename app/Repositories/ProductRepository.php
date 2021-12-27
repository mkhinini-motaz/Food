<?php

namespace App\Repositories;

use App\Models\Choice;
use App\Models\OptionGroup;
use App\Models\Product;

class ProductRepository
{
    /**
     * @var Product
     */
    private $product;

    /**
     * ProductRepository constructor.
     *
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @param Product $product
     * @param Choice  $choice
     * @param array   $productChoices from the returned value of OptionOrderProductRepository::optionChoicesForOrders
     *                              take index order_product_id($product->pivot->id)
     */
    public static function attachOptionChoicesToProduct(Product $product, Choice $choice, $productChoices)
    {
        $product->product_count = $choice->product_count;
        if ($product->type !== Product::TYPE_WITH_OPTIONS) {
            return;
        }

        /** @var OptionGroup $optionGroup */
        foreach ($product->optionGroups as $optionGroupKey => $optionGroup) {
            $countChosenOptions = 0;
            foreach ($optionGroup->options as $optionKey => $option) {
                if (! isset($productChoices[$option->id])) {
                    $optionGroup->options->pull($optionKey);
                    continue;
                }

                $optionGroup->attachChoicesForOption($option, $productChoices[$option->id]);
                $countChosenOptions++;
            }

            if (0 === $countChosenOptions) {
                $product->optionGroups->pull($optionGroupKey);
            }
        }
    }

    /**
     *
     */
    public function makeVisible()
    {
        $this->product->is_visible = true;
        $this->product->save();
    }

    /**
     *
     */
    public function makeInvisible()
    {
        $this->product->is_visible = false;
        $this->product->save();
    }
}
