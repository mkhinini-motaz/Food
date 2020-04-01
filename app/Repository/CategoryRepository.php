<?php

namespace App\Repositories;

use App\Model\Category;
use App\Model\Shop;

use function App\Helpers\fieldsLike;

class CategoryRepository
{
    /**
     * @var Category
     */
    private $category;

    /**
     * CategoryRepository constructor.
     *
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Paginates categories
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
        $categories = Category::query();

        if (isset($search)) {
            $categories->where(fieldsLike($search, 'name'));
        }

        if ($isShopApproved && in_array($isShopApproved, Shop::IS_APPROVED_VALUES)) {
            $categories->whereHas('shop', Shop::withIsApprovedEquals($isShopApproved));
        }

        if (isset($orderBy) && isset($orderDirection)) {
            $categories->orderBy($orderBy, $orderDirection);
        }

        return $categories->paginate($perPage, ['*'], 'page', $page);
    }

    /**
     * Paginates category products
     *
     * @param int $page
     * @param int $perPage
     * @param string|null $search
     * @param string $orderBy
     * @param string $orderDirection
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginateProducts($page = 1, $perPage = 20, $search = null, $orderBy = 'created_at', $orderDirection = 'asc')
    {
        $products = $this->category->products();

        if (isset($search)) {
            $products->where(fieldsLike($search));
        }

        if (isset($orderBy) && isset($orderDirection)) {
            $products->orderBy($orderBy, $orderDirection);
        }

        return $products->paginate($perPage, ['*'], 'page', $page);
    }
}