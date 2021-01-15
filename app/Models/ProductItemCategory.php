<?php

namespace App\Models;

use App\Support\Model;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category
 * @package App\Models
 *
 * @property int id
 * @property string name
 * @property string description
 * @property string photo
 *
 * @property int product_id
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Collection products
 */
class ProductItemCategory extends Model
{
    protected $dateFormat = 'U';

    /**
     * @return BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * @return HasMany
     */
    public function productItems()
    {
        return $this->hasMany(ProductItem::class);
    }

    /**
     * @param int      $categoryId
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
