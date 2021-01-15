<?php

namespace App\Models;

use App\Support\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ShopPayment
 * @package App\Models
 *
 * @property int    id
 * @property string name
 * @property string description
 * @property int    amount
 *
 * @property int shop_id
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Shop shop
 */
class ShopPayment extends Model
{
    protected $dateFormat = 'U';

    /**
     * @return BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
