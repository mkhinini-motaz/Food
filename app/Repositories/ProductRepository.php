<?php

namespace App\Repositories;

use App\Models\IngredientCategory;
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
     * @param array $productChoices from the returned value of IngredientOrderProductRepository::ingredientChoicesForOrders
     *                              take index order_product_id($product->pivot->id)
     */
    public static function attachIngredientChoicesToProduct(Product $product, $productChoices)
    {
        if ($product->type !== Product::TYPE_WITH_INGREDIENTS) {
            return;
        }

        /** @var IngredientCategory $ingredientCategory */
        foreach ($product->ingredientCategories as $ingredientCategoryKey => $ingredientCategory) {
            $countChosenIngredients = 0;
            foreach ($ingredientCategory->ingredients as $ingredientKey => $ingredient) {
                if (! isset($productChoices[$ingredient->id])) {
                    $ingredientCategory->ingredients->pull($ingredientKey);
                    continue;
                }

                $ingredientCategory->attachChoicesForIngredient($ingredient, $productChoices[$ingredient->id]);
                $countChosenIngredients++;
            }

            if (0 === $countChosenIngredients) {
                $product->ingredientCategories->pull($ingredientCategoryKey);
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
