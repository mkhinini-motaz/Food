<?php

namespace App\Models;

use App\Support\Model;

/**
 * Class Location
 * @package App\Models
 *
 * @property int id
 * @property string name
 * @property string latitude
 * @property string longitude
 *
 * @property int shop_id
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Shop shop
 */
class Location extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
