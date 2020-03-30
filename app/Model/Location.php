<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Location extends Authenticatable
{
    protected $dateFormat = 'U';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
