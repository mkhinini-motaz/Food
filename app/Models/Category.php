<?php

namespace App\Models;

use App\Support\Model;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class Category
 * @package App\Model
 *
 * @property int id
 * @property string name
 * @property string description
 * @property string photo
 *
 * @property int shop_id
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Collection shop
 * @property Collection products
 */
class Category extends Model
{
    protected $dateFormat = 'U';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @param int $categoryId
     * @param int|null $isShopApproved
     *
     * @return Category|null
     */
    public static function findOrFail($categoryId, $isShopApproved = null)
    {
        if (in_array($isShopApproved, Shop::IS_APPROVED_VALUES)) {
            return Category::whereHas('shop', Shop::withIsApprovedEquals($isShopApproved))->findOrFail($categoryId);
        }
        return parent::findOrFail($categoryId);
    }
}
