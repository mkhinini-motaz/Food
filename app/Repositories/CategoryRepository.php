<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Shop;

use function App\Support\Helpers\fieldsLike;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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
     * Paginate categories
     *
     * @param int         $page
     * @param int         $perPage
     * @param string|null $search
     * @param string      $orderBy
     * @param string      $orderDirection
     * @param int|null    $isShopApproved
     *
     * @return LengthAwarePaginator
     */
    public static function paginate($page = 1, $perPage = 20, $search = null, $orderBy = 'created_at', $orderDirection = 'desc', $isShopApproved = null)
    {
        $categories = Category::query();

        if (isset($search)) {
            $categories->where(fieldsLike($search, 'name'));
        }

        if (isset($isShopApproved) && in_array($isShopApproved, Shop::IS_APPROVED_VALUES)) {
            $categories->whereHas('shop', Shop::withIsApprovedEquals($isShopApproved));
        }

        if (isset($orderBy) && isset($orderDirection)) {
            $categories->orderBy($orderBy, $orderDirection);
        }

        return $categories->paginate($perPage, [ '*' ], 'page', $page);
    }

    /**
     * Paginate category products
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
    public function paginateProducts($page = 1, $perPage = 20, $search = null, $orderBy = 'created_at', $orderDirection = 'desc', $onlyVisible = true)
    {
        $products = $this->category->products()
            ->with('ingredientCategories.ingredients');

        if ($onlyVisible) {
            $products->where('is_visible', '=', 1);
        }

        if (isset($search)) {
            $products->where(fieldsLike($search));
        }

        if (isset($orderBy) && isset($orderDirection)) {
            $products->orderBy($orderBy, $orderDirection);
        }

        return $products->paginate($perPage, [ '*' ], 'page', $page);
    }

    /**
     *
     */
    public function makeVisible()
    {
        $this->category->is_visible = true;
        $this->category->save();
    }

    /**
     *
     */
    public function makeInvisible()
    {
        $this->category->is_visible = false;
        $this->category->save();
    }
}
