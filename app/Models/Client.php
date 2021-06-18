<?php

namespace App\Models;

use App\Support\Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 * @package App\Models
 *
 * @property int    id
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string password
 * @property string phone
 * @property int    last_login_at
 * @property bool   is_phone_confirmed
 * @property int    loyalty_points_count
 * @property string invite_code
 * @property int    shop_id
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Shop       shop
 * @property Collection orders
 * @property Collection loyaltyActions
 */
class Client extends Authenticatable
{
    use HasFactory, SoftDeletes;

    public const INVITE_CODE_LENGTH = 10;

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
     * @return BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    /**
     * @return BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * @return HasMany
     */
    public function loyaltyActions()
    {
        return $this->hasMany(LoyaltyAction::class);
    }

    /**
     * @param int    $shopId
     * @param string $phone
     *
     * @return bool
     */
    public static function phoneExistsForShop($shopId, $phone)
    {
        return 1 <= self::where('shop_id', '=', $shopId)
            ->where('phone', '=', $phone)
            ->count();
    }
}
