<?php

namespace App\Models;

use App\Support\Authenticatable;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
 * @property string birth_date
 * @property int    gender
 * @property string email
 * @property string password
 * @property string phone
 * @property int|null last_login_at
 * @property int|null inviter_client_id
 * @property bool   is_phone_confirmed
 * @property int    loyalty_points_count
 * @property string invite_code
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Client     inviterClient
 * @property Collection orders
 * @property Collection loyaltyActions
 * @mixin IdeHelperClient
 */
class Client extends Authenticatable
{
    use HasFactory, SoftDeletes;

    public const INVITE_CODE_LENGTH = 10;

    public const GENDER_MALE   = 1;
    public const GENDER_FEMALE = 2;
    public const GENDERS = [ self::GENDER_MALE, self::GENDER_FEMALE ];

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
     * @return HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class)
            ->whereNotIn('status', Order::CANCELED_STATUSES);
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
            ->orderByDesc('created_at')
            ->withCount('orders');
    }

    /**
     * @return HasMany
     */
    public function invitedClients()
    {
        return $this->hasMany(Client::class, 'inviter_client_id');
    }

    /**
     * @return BelongsTo
     */
    public function inviterClient()
    {
        return $this->belongsTo(Client::class, 'inviter_client_id', 'id');
    }

    /**
     *
     */
    public function loadPlatformInfo()
    {
        $this->shops = Shop::isApproved()->get();
        $this->promoCodeValues = PromoCodeShopItem::where('currency', '=', 'TND')->get();
        $this->serviceArea = ServiceArea::find(1); // TODO: make it dynamic
    }

    /**
     * @param string $phone
     *
     * @return bool
     */
    public static function phoneIsActive($phone)
    {
        return 1 <= self::where('phone', '=', $phone)
            ->whereNotNull('last_login_at')
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
