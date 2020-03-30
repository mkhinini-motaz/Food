<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

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
