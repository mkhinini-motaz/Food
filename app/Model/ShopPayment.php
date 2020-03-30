<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopPayment extends Model
{
    protected $dateFormat = 'U';

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
