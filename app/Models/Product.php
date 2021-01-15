<?php

namespace App\Models;

use App\Support\Model;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

/**
 * Class Product
 * @package App\Models
 *
 * @property int    id
 * @property string name
 * @property string description
 * @property string brand
 * @property string photo
 * @property int    weight
 * @property int    height
 * @property int    width
 * @property int    length
 * @property int    price
 * @property bool   is_visible
 *
 * @property int category_id
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Category   category
 * @property Shop       shop
 * @property Collection orders
 */
class Product extends Model
{
    const TYPE_FIXED        = 1;
    const TYPE_WITH_OPTIONS = 2;
    const TYPES = [ self::TYPE_FIXED, self::TYPE_WITH_OPTIONS ];

    protected $dateFormat = 'U';

    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return HasOneThrough
     */
    public function shop()
    {
        return $this->hasOneThrough(Shop::class, Category::class, 'id', 'id', 'category_id', 'shop_id');
    }

    /**
     * @return BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    /**
     * @return BelongsToMany
     */
    public function productItemCategories()
    {
        return $this->belongsToMany(ProductItemCategory::class);
    }
}
