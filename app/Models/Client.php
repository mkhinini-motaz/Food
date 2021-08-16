<?php

namespace App\Models;

use App\Support\Authenticatable;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
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
        return $this->morphMany(PromoCode::class, 'creator')
            ->orderByDesc('created_at');
    }

    /**
     *
     */
    public function loadPlatformInfo()
    {
        $this->shops = Shop::isApproved()->get();
        $this->promoCodeValues = PromoCodeShopItem::where('currency', '=', 'TND')->get();
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

    /**
     * @return string
     */
    public static function generateInviteCode()
    {
        do {
            $inviteCode       = Str::random(Client::INVITE_CODE_LENGTH);
            $inviteCodeExists = 1 <= Client::where('invite_code', '=', $inviteCode)
                    ->count();
        } while ($inviteCodeExists);

        return $inviteCode;
    }
}
