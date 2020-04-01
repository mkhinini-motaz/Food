<?php

namespace App\Repositories;

use App\Model\Product;
use App\Model\Shop;

use function App\Support\Helpers\fieldsLike;

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
     * Paginates products
     *
     * @param int $page
     * @param int $perPage
     * @param string|null $search
     * @param string $orderBy
     * @param string $orderDirection
     * @param int|null $isShopApproved
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function paginate($page = 1, $perPage = 20, $search = null, $orderBy = 'created_at', $orderDirection = 'asc', $isShopApproved = null)
    {
        $products = Product::query();

        if (isset($search)) {
            $products->where(fieldsLike($search, 'name'));
        }

        if ($isShopApproved && in_array($isShopApproved, Shop::IS_APPROVED_VALUES)) {
            $products->whereHas('shop', Shop::withIsApprovedEquals($isShopApproved));
        }

        if (isset($orderBy) && isset($orderDirection)) {
            $products->orderBy($orderBy, $orderDirection);
        }

        return $products->paginate($perPage, ['*'], 'page', $page);
    }
}