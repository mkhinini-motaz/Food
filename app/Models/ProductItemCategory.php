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
 * @property int    id
 * @property string name
 * @property string description
 * @property string photo
 * @property bool   is_visible
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Collection products
 * @property Collection productItems
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
}
