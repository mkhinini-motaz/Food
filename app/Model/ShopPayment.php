<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ShopPayment
 * @package App\Model
 *
 * @property int id
 * @property string name
 * @property string description
 * @property integer amount
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
