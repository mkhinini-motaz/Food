<?php

namespace App\Model;

use App\Support\Model;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class Product
 * @package App\Model
 *
 * @property int id
 * @property string name
 * @property string description
 * @property string brand
 * @property string photo
 * @property int weight
 * @property int height
 * @property int width
 * @property int length
 * @property int price
 *
 * @property string category_id
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Category category
 * @property Shop shop
 * @property Collection orders
 */
class Product extends Model
{
    protected $dateFormat = 'U';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop()
    {
        return $this->hasOneThrough(Shop::class, Category::class, 'id', 'id', 'category_id', 'shop_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
