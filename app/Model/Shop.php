<?php

namespace App\Model;

use App\Support\Model;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class Shop
 * @package App\Model
 *
 * @property int id
 * @property string name
 * @property string logo
 * @property string phone
 * @property int pricing_category
 * @property int min_order_price
 * @property string average_ready_minutes
 * @property bool is_approved
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Collection categories
 * @property Collection orders
 * @property Collection products
 */
class Shop extends Model
{
    const IS_APPROVED_FALSE = 0;
    const IS_APPROVED_TRUE = 1;
    const IS_APPROVED_VALUES = [ self::IS_APPROVED_FALSE, self::IS_APPROVED_TRUE ];

    const PRICING_CATEGORY_VERY_LOW = 1;
    const PRICING_CATEGORY_LOW = 2;
    const PRICING_CATEGORY_MEDIUM = 3;
    const PRICING_CATEGORY_HIGH = 4;
    const PRICING_CATEGORY_VERY_HIGH = 5;

    const PRICING_CATEGORIES = [ self::PRICING_CATEGORY_VERY_LOW, self::PRICING_CATEGORY_LOW, self::PRICING_CATEGORY_MEDIUM, self::PRICING_CATEGORY_HIGH, self::PRICING_CATEGORY_VERY_HIGH ];

    protected $dateFormat = 'U';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function products()
    {
        return $this->hasManyThrough(Product::class, Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * @param int $isShopApproved
     *
     * @return \Closure
     */
    public static function withIsApprovedEquals($isShopApproved)
    {
        return function ($query) use ($isShopApproved) {
            $query->where('is_approved', '=', $isShopApproved);
        };
    }
}
