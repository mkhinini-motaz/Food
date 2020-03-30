<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ShopUser extends Authenticatable
{
    const ROLE_OWNER = 1;
    const ROLE_SHOP_KEEPER = 20;

    const ROLES = [ self::ROLE_OWNER, self::ROLE_SHOP_KEEPER ];

    protected $dateFormat = 'U';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
