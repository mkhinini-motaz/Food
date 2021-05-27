<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class LoyaltyAction
 *
 *
 * @property int    id
 * @property int    type
 * @property int    points_rewarded
 * @property int    client_id
 * @property string meta
 *
 * @property int created_at
 * @property int updated_at
 *
 * @package App\Models
 */
class LoyaltyAction extends Model
{
    use HasFactory;

    const TYPE_REGISTRATION = 1;
    const TYPE_FRIEND_INVITE = 2;
    const TYPE_FIRST_ORDER = 3;
    const TYPE_PRODUCT_BOUGHT = 4;
    const TYPE_ONLINE_ORDER_COUNT_FOR_MONTH = 5;
    const TYPE_ON_SITE_ORDER_COUNT_FOR_MONTH = 6; // TODO: keep this or the one above
    const TYPE_SUBMIT_FEEDBACK = 7;
    const TYPE_BIRTHDAY_GIFT = 8;
    const TYPE_PROMO_CODE_BOUGHT = 9;
    const TYPE_SHOP_REWARD = 44;
    const TYPE_SEND_POINTS = 77; // TODO: may be bad, can create multiple accounts for welcome reward
    const TYPE_RECEIVE_POINTS = 55;
    const TYPES = [ self::TYPE_REGISTRATION, self::TYPE_FRIEND_INVITE, self::TYPE_FIRST_ORDER, self::TYPE_PRODUCT_BOUGHT, self::TYPE_ONLINE_ORDER_COUNT_FOR_MONTH, self::TYPE_ON_SITE_ORDER_COUNT_FOR_MONTH, self::TYPE_SUBMIT_FEEDBACK, self::TYPE_BIRTHDAY_GIFT, self::TYPE_PROMO_CODE_BOUGHT, self::TYPE_SHOP_REWARD, self::TYPE_SEND_POINTS, self::TYPE_RECEIVE_POINTS, ];

    /**
     * @return BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
