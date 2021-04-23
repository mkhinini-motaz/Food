<?php

namespace App\Models;

use App\Support\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

/**
 * Class Category
 * @package App\Models
 *
 * @property int    id
 * @property string name
 * @property string description
 * @property string photo
 * @property bool   is_visible
 * @property int    order
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
    use HasFactory, HasTranslations;

    protected $dateFormat = 'U';

    public $translatable = [ 'name', 'description' ];

    /**
     * @return BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * @return HasMany
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
