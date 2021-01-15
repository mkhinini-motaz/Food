<?php

namespace App\Models;

use App\Support\Authenticatable;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Admin
 * @package App\Models
 *
 * @property int    id
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string password
 * @property int    role
 * @property string phone
 *
 * @property int    created_at
 * @property int    updated_at
 * @property int    deleted_at
 *
 * @property Collection promo_codes
 */
class Admin extends Authenticatable
{
    const ROLE_SUPER_ADMIN   = 1;
    const ROLE_ADMIN         = 2;
    const ROLE_VISITOR_ADMIN = 20;

    const ROLES = [ self::ROLE_SUPER_ADMIN, self::ROLE_ADMIN, self::ROLE_VISITOR_ADMIN ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return HasMany
     */
    public function promoCodes()
    {
        return $this->hasMany(PromoCode::class)->get();
    }
}
