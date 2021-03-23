<?php

namespace App\Repositories;

use App\Models\Ingredient;
use App\Models\IngredientCategory;
use App\Models\Product;
use App\Models\Shop;

use Illuminate\Support\Collection;
use function App\Support\Helpers\fieldsLike;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ShopRepository
{
    /**
     * @var Shop
     */
    private $shop;

    /**
     * ShopRepository constructor.
     *
     * @param Shop $shop
     */
    public function __construct(Shop $shop)
    {
        $this->shop = $shop;
    }

    /**
     * Paginate shops
     *
     * @param int         $page
     * @param int         $perPage
     * @param string|null $search
     * @param string      $orderBy
     * @param string      $orderDirection
     * @param bool|null   $isApproved
     *
     * @return LengthAwarePaginator
     */
    public static function paginate($page = 1, $perPage = 20, $search = null, $orderBy = 'created_at', $orderDirection = 'desc', $isApproved = null)
    {
        $shops = Shop::query();

        if (isset($search)) {
            $shops->where(fieldsLike($search, 'name'));
        }

        if (isset($isApproved) && in_array($isApproved, Shop::IS_APPROVED_VALUES)) {
            $shops->where('is_approved', '=', $isApproved);
        }

        if (isset($orderBy) && isset($orderDirection)) {
            $shops->orderBy($orderBy, $orderDirection);
        }

        return $shops->paginate($perPage, [ '*' ], 'page', $page);
    }

    /**
     * Paginate products
     *
     * @param int         $page
     * @param int         $perPage
     * @param string|null $search
     * @param string      $orderBy
     * @param string      $orderDirection
     * @param array|null  $categoryIds
     * @param array|null  $productIds
     *
     * @return LengthAwarePaginator
     */
    public function paginateProducts($page = 1, $perPage = 20, $search = null, $orderBy = 'created_at', $orderDirection = 'desc', $categoryIds = null, $productIds = null)
    {
        $products = $this->shop->products();

        if (isset($search)) {
            $products->where(fieldsLike($search, 'name'));
        }

        if (isset($productIds) && is_array($productIds) && count($productIds) !== 0) {
            $products->whereIn('products.id', $productIds);
        }

        if (isset($categoryIds) && is_array($categoryIds) && count($categoryIds) !== 0) {
            $products->whereIn('category_id', $categoryIds);
        }

        if (isset($orderBy) && isset($orderDirection)) {
            $products->orderBy($orderBy, $orderDirection);
        }

        return $products->paginate($perPage, [ '*' ], 'page', $page);
    }

    /**
     * Paginate categories
     *
     * @param int         $page
     * @param int         $perPage
     * @param string|null $search
     * @param string      $orderBy
     * @param string      $orderDirection
     *
     * @return LengthAwarePaginator
     */
    public function paginateCategories($page = 1, $perPage = 20, $search = null, $orderBy = 'created_at', $orderDirection = 'desc')
    {
        $categories = $this->shop->categories()
            ->where('is_visible', '=', 1);

        if (isset($search)) {
            $categories->where(fieldsLike($search, 'name'));
        }

        if (isset($orderBy) && isset($orderDirection)) {
            $categories->orderBy($orderBy, $orderDirection);
        }

        return $categories->paginate($perPage, [ '*' ], 'page', $page);
    }

    /**
     * Paginate products
     *
     * @param int         $page
     * @param int         $perPage
     * @param string|null $search
     * @param string      $orderBy
     * @param string      $orderDirection
     * @param bool        $withChoices
     *
     * @return LengthAwarePaginator
     */
    public function paginateOrders($page = 1, $perPage = 20, $search = null, $orderBy = 'created_at', $orderDirection = 'desc', $withChoices = false)
    {
        $orders = $this->shop->orders()
            ->with('products.ingredientCategories.ingredients');

        if (isset($search)) {
            $orders->where(fieldsLike($search, 'name'));
        }

        if (isset($orderBy) && isset($orderDirection)) {
            $orders->orderBy($orderBy, $orderDirection);
        }

        $orders = $orders->paginate($perPage, [ '*' ], 'page', $page);

        if ($withChoices) {
            return self::attachChoicesToOrders($orders);
        }

        return $orders;
    }

    /**
     * @param Collection|array|LengthAwarePaginator $orders
     *
     * @return Collection|array|LengthAwarePaginator
     */
    public static function attachChoicesToOrders($orders)
    {
        $ordersIds = $orders->pluck('id');
        $choices = IngredientOrderProductRepository::ingredientChoicesForOrders($ordersIds);

        foreach ($orders as $order) {
            foreach ($order->products as $product) {
                $productChoices = $choices[$product->pivot->id] ?? [];
                self::attachIngredientChoicesToProduct($product, $productChoices);
            }
        }

        return $orders;
    }

    /**
     * @param Product $product
     * @param array   $productChoices
     */
    public static function attachIngredientChoicesToProduct(Product $product, $productChoices)
    {
        if ($product->type !== Product::TYPE_WITH_INGREDIENTS) {
            return;
        }

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
}
