<?php

namespace App\Models;

use App\Casts\Json;
use App\Support\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class LoyaltyAction
 * @package App\Models
 *
 * @property int    id
 * @property int    type
 * @property int    points_rewarded
 * @property int    client_id
 * @property int    order_id
 * @property array  meta
 *
 * @property int created_at
 * @property int updated_at
 * @mixin IdeHelperLoyaltyAction
 */
class LoyaltyAction extends Model
{
    use HasFactory;

    const TYPE_REGISTRATION = 1;
    const TYPE_LOYALTY_BONUS = 2;
    const TYPE_FRIEND_INVITE = 3;
    const TYPE_ORDER = 4;
    const TYPE_PROMO_CODE_BOUGHT = 5;
    const TYPE_BIRTHDAY_GIFT = 6;
    const TYPE_SUBMIT_FEEDBACK = 7; // TODO: implement

    const TYPES = [ self::TYPE_REGISTRATION, self::TYPE_LOYALTY_BONUS, self::TYPE_FRIEND_INVITE, self::TYPE_SUBMIT_FEEDBACK, self::TYPE_BIRTHDAY_GIFT, self::TYPE_PROMO_CODE_BOUGHT, self::TYPE_ORDER ];

    const POINTS_AWARDED_BY_TYPE = [
        LoyaltyAction::TYPE_REGISTRATION                  => 10,
        LoyaltyAction::TYPE_LOYALTY_BONUS                 => 20,
        LoyaltyAction::TYPE_FRIEND_INVITE                 => 100,

        LoyaltyAction::TYPE_SUBMIT_FEEDBACK               => 7,
        LoyaltyAction::TYPE_BIRTHDAY_GIFT                 => 60,
    ];

    protected $casts = [
        'meta' => Json::class,
    ];

    /**
     * @return BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
