<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\Option;
use App\Models\OptionGroup;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;

use Illuminate\Database\Query\Builder;
use function App\Support\Helpers\columnInPeriod;
use function App\Support\Helpers\fieldsLike;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use function App\Support\Helpers\firstNameLastNameLike;

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
     * @param bool        $withCategory
     *
     * @return LengthAwarePaginator
     */
    public function paginateProducts($page = 1, $perPage = 20, $search = null, $orderBy = 'created_at', $orderDirection = 'desc', $categoryIds = null, $productIds = null, $withCategory = false)
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

        if ($withCategory) {
            $products->with('category');
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
     * @param bool        $withProducts
     *
     * @return LengthAwarePaginator
     */
    public function paginateCategories($page = 1, $perPage = 20, $search = null, $orderBy = 'created_at', $orderDirection = 'desc', $onlyVisible = true, $withProducts = true)
    {
        $categories = $this->shop->categories();

        if ($withProducts) {
            $categories->withProducts($onlyVisible, $search, $orderBy, $orderDirection);
        }

        if ($onlyVisible) {
            $categories->where('is_visible', '=', 1);
        }

        if (isset($search)) {
            $categories->where(function ($query) use ($search, $onlyVisible, $withProducts) {
                $query->where(fieldsLike($search, 'name'));
                if ($withProducts) {
                    $query->orWhereHas('products', function ($productsQuery) use ($search, $onlyVisible) {
                        if ($onlyVisible) {
                            $productsQuery->where('is_visible', '=', 1);
                        }
                        $productsQuery->where(fieldsLike($search, 'name'));
                    });
                }
            });
        }

        if (isset($orderBy) && isset($orderDirection)) {
            $categories->orderBy($orderBy, $orderDirection);
        }

        return $categories->paginate($perPage, [ '*' ], 'page', $page);
    }

    /**
     * @param null  $dateTime
     * @param array $statuses
     *
     * @return Collection
     */
    public function orders($dateTime = null, $statuses = [])
    {
        if (! $dateTime) {
            $dateTime = date('d-m-Y H:i');
        }

        $workingHours = $this->shop->workingTimestampsForDate($dateTime);
        if (0 === count($workingHours)) {
            return collect();
        }

        $orders = $this->shop->orders()
            ->withNeededRelationsForProcessing()
            ->orderByDesc('created_at')
            ->orderByDesc('id');

        $orders->where(columnInPeriod($workingHours, 'orders.created_at'));

        if (is_array($statuses) && count($statuses) > 0) {
            $orders->whereIn('status', $statuses);
        }

        $orders = $orders->get();

        return $orders;
    }

    /**
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

    /**
     * @param int|null    $page
     * @param int|null    $perPage
     * @param string|null $search
     * @param string|null $orderBy
     * @param string|null $orderDirection
     *
     * @return LengthAwarePaginator
     */
    public function paginateTransporters($page = 1, $perPage = 20, $search = null, $orderBy = 'created_at', $orderDirection = 'desc')
    {
        $shopTransporters = $this->shop->shopTransporters()
            ->withCount('activeOrders');

        if ($orderBy && $orderDirection) {
            $shopTransporters->orderBy($orderBy, $orderDirection);
        }

        if ($search) {
            $shopTransporters->where(firstNameLastNameLike($search));
        }

        return $shopTransporters->paginate($perPage, [ '*' ], 'page', $page);
    }

    /**
     * @param array $serviceArea
     */
    public function updateServiceArea($serviceArea)
    {
        $this->shop->service_area = $serviceArea;
        $this->shop->saveOrFail();
    }

    /**
     * @param string $menuDisplayedLang
     */
    public function updateMenuDisplayedLang($menuDisplayedLang)
    {
        $this->shop->menu_displayed_lang = $menuDisplayedLang;
        $this->shop->saveOrFail();
    }
}
