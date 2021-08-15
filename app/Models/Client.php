<?php

namespace App\Models;

use App\Support\Authenticatable;

use Illuminate\Database\Eloquent\Relations\MorphMany;
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
     * @return BelongsToMany
     */
    public function shops()
    {
        return $this->belongsToMany(Shop::class)
            ->withPivot([ 'loyalty_points_count' ]);
    }

    /**
     * @return HasMany
     */
    public function loyaltyActions()
    {
        return $this->hasMany(LoyaltyAction::class);
    }

    /**
     * @return MorphMany
     */
    public function promoCodes()
    {
        return $this->morphMany(PromoCode::class, 'creator');
    }

    /**
     * @param string $phone
     *
     * @return bool
     */
    public static function phoneExists($phone)
    {
        return 1 <= self::where('phone', '=', $phone)
            ->count();
    }
}
