<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\OptionGroup;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;

use function App\Support\Helpers\fieldsLike;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
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
     * @param bool        $onlyVisible
     *
     * @return LengthAwarePaginator
     */
    public function paginateCategories($page = 1, $perPage = 20, $search = null, $orderBy = 'created_at', $orderDirection = 'desc', $onlyVisible = true)
    {
        $categories = $this->shop->categories();

        if ($onlyVisible) {
            $categories->where('is_visible', '=', 1);
        }

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
     * @param int    $page
     * @param int    $perPage
     * @param string $orderBy
     * @param string $orderDirection
     * @param bool   $withChoices
     * @param array  $statuses
     *
     * @return LengthAwarePaginator
     */
    public function paginateOrders($page = 1, $perPage = 20, $orderBy = 'created_at', $orderDirection = 'desc', $withChoices = false, $statuses = [])
    {
        $orders = $this->shop->orders()
            ->withNeededRelationsForProcessing();

        if (isset($orderBy) && isset($orderDirection)) {
            $orders->orderBy($orderBy, $orderDirection);
        }

        if (is_array($statuses) && count($statuses) > 0) {
            $orders->whereIn('status', $statuses);
        }

        $orders = $orders->paginate($perPage, [ '*' ], 'page', $page);

        if ($withChoices) {
            return OrderRepository::attachChoicesToOrders($orders);
        }

        return $orders;
    }

    /**
     * @param array $serviceArea
     */
    public function updateServiceArea($serviceArea)
    {
        $this->shop->service_area = $serviceArea;
        $this->shop->save();
    }

    /**
     * Paginates the users of a site
     *
     * @param int|null    $page
     * @param int|null    $perPage
     * @param string|null $search
     * @param string|null $orderBy
     * @param string|null $orderDirection
     *
     * @return LengthAwarePaginator
     */
    public function paginateActivityLogs($page = 1, $perPage = 20, $search = null, $orderBy = 'created_at', $orderDirection = 'desc')
    {
        $activityLogs = $this->shop->activityLogs()->with([ 'causer', 'subject' ]);

        if ($orderBy && $orderDirection) {
            $activityLogs->orderBy($orderBy, $orderDirection);
        }

        if ($search && is_array($search)) {
            if (count($search) > 0) {
                $activityLogs->where(function ($query) use ($search) {
                    $query->whereIn('description', $search)
                        ->orWhereIn('subject_type', $search);
                });
            } else {
                $activityLogs->where('id', '=', '[]'); // receiving empty array means the search has no matching translations
            }
        }

        return $activityLogs->paginate($perPage, [ '*' ], 'page', $page);
    }
}
