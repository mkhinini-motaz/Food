<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    const ROLE_SUPER_ADMIN = 1;
    const ROLE_VISITOR_ADMIN = 20;

    const ROLES = [ self::ROLE_SUPER_ADMIN, self::ROLE_VISITOR_ADMIN ];

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function promoCodes()
    {
        return $this->hasMany(PromoCode::class);
    }
}
