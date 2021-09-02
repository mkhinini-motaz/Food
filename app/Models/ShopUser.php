<?php

namespace App\Models;

use App\Support\Authenticatable;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * Class ShopUser
 * @package App\Models
 *
 * @property int    id
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string phone
 * @property string password
 * @property string role
 *
 * @property int shop_id
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Shop shop
 */
class ShopUser extends Authenticatable
{
    use HasFactory;

    const ROLE_OWNER       = 1;
    const ROLE_MASTER_CHEF = 2;
    const ROLE_TRANSPORTER = 5;
    const ROLE_SHOP_KEEPER = 20;

    const ROLES = [ self::ROLE_OWNER, self::ROLE_TRANSPORTER, self::ROLE_MASTER_CHEF, self::ROLE_SHOP_KEEPER ];
    const ROLES_CAN_TRANSPORT = [ self::ROLE_OWNER, self::ROLE_TRANSPORTER, self::ROLE_SHOP_KEEPER ];

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
     * @return BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * @return MorphMany
     */
    public function promoCodes()
    {
        return $this->morphMany(PromoCode::class, 'creator');
    }

    /**
     * @return HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'shop_transporter_id');
    }

    /**
     * @return HasMany
     */
    public function activeOrders()
    {
        return $this->orders()
            ->whereIn('status', Order::ACTIVE_TRANSPORTER_STATUSES);
    }
}
