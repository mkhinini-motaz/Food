<?php

namespace App\Repositories;

use App\Models\Shop;

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
}
