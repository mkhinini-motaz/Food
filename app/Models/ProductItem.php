<?php

namespace App\Models;

use App\Support\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Product
 * @package App\Models
 *
 * @property int    id
 * @property string name
 * @property string description
 * @property string brand
 * @property string photo
 * @property int    price
 * @property bool   is_visible
 *
 * @property int product_item_category_id
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property ProductItemCategory productItemCategory
 * @property Collection          orders
 */
class ProductItem extends Model
{
    use HasFactory;

    protected $dateFormat = 'U';

    /**
     * @return BelongsTo
     */
    public function productItemCategory()
    {
        return $this->belongsTo(ProductItemCategory::class);
    }

    /**
     * @return BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
