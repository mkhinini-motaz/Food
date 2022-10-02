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
    const TYPE_EARLY_REGISTRATION = 2; // TODO: use in code
    const TYPE_FRIEND_INVITE = 3;
    const TYPE_FIRST_ORDER = 4;
    const TYPE_PRODUCT_BOUGHT = 5;
    const TYPE_ONLINE_ORDER_COUNT_FOR_MONTH = 6;
    const TYPE_ON_SITE_ORDER_COUNT_FOR_MONTH = 7; // TODO: keep this or the one above
    const TYPE_SUBMIT_FEEDBACK = 8;
    const TYPE_BIRTHDAY_GIFT = 9;
    const TYPE_PROMO_CODE_BOUGHT = 10;
    const TYPE_SHOP_REWARD = 44;
    const TYPE_SEND_POINTS = 77; // TODO: may be bad, can create multiple accounts for welcome reward
    const TYPE_RECEIVE_POINTS = 55;
    const TYPES = [ self::TYPE_REGISTRATION, self::TYPE_EARLY_REGISTRATION, self::TYPE_FRIEND_INVITE, self::TYPE_FIRST_ORDER, self::TYPE_PRODUCT_BOUGHT, self::TYPE_ONLINE_ORDER_COUNT_FOR_MONTH, self::TYPE_ON_SITE_ORDER_COUNT_FOR_MONTH, self::TYPE_SUBMIT_FEEDBACK, self::TYPE_BIRTHDAY_GIFT, self::TYPE_PROMO_CODE_BOUGHT, self::TYPE_SHOP_REWARD, self::TYPE_SEND_POINTS, self::TYPE_RECEIVE_POINTS, ];

    const POINTS_AWARDED_BY_TYPE = [
        LoyaltyAction::TYPE_REGISTRATION                  => 10,
        LoyaltyAction::TYPE_FRIEND_INVITE                 => 7,
        LoyaltyAction::TYPE_FIRST_ORDER                   => 5,
        LoyaltyAction::TYPE_PROMO_CODE_BOUGHT             => 2,

        LoyaltyAction::TYPE_ONLINE_ORDER_COUNT_FOR_MONTH  => 1,
        LoyaltyAction::TYPE_ON_SITE_ORDER_COUNT_FOR_MONTH => 1,
        LoyaltyAction::TYPE_SUBMIT_FEEDBACK               => 1,
        LoyaltyAction::TYPE_BIRTHDAY_GIFT                 => 1,
        LoyaltyAction::TYPE_SHOP_REWARD                   => 1,
        LoyaltyAction::TYPE_SEND_POINTS                   => 1,
        LoyaltyAction::TYPE_RECEIVE_POINTS                => 1,
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

    /**
     * @return int
     */
    public function calculatePointsRewarded()
    {
        return self::POINTS_AWARDED_BY_TYPE[$this->type];
    }
}
