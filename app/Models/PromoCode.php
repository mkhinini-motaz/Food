<?php

namespace App\Models;

use App\Support\Model;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class PromoCode
 * @package App\Models
 *
 * @property int    id
 * @property string code
 * @property int    expires_at
 * @property int    max_usage_count
 * @property int    reduction_amount
 *
 * @property int    creator_id
 * @property string creator_type
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Admin|Client|ShopUser creator
 */
class PromoCode extends Model
{
    use HasFactory;

    const DEFAULT_LENGTH = 10;
    // TODO: ask, promocode.type pourcentage discount instead of money amount

    protected $dateFormat = 'U';

    /**
     * @return BelongsTo
     */
    public function creator()
    {
        return $this->morphTo();
    }

    /**
     * @return HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @param int  $promoCodeId
     *
     * @return bool
     */
    public static function promoCodeExistsAndIsUsable($promoCodeId)
    {
        /** @var PromoCode $promoCode */
        $promoCode = self::withCount('orders')
            ->where('expires_at', '>', time())
            ->find($promoCodeId);

        return isset($promoCode) && $promoCode->max_usage_count > $promoCode->orders_count;
    }

    /**
     * @param int  $promoCodeId
     *
     * @return bool
     */
    public static function promoCodeDoesntExistsOrIsNotUsable($promoCodeId)
    {
        return ! self::promoCodeExistsAndIsUsable($promoCodeId);
    }

    /**
     * @return string
     */
    public static function generateCode()
    {
        do {
            $code       = strtolower(Str::random(self::DEFAULT_LENGTH));
            $codeExists = 1 <= self::where('code', '=', $code)
                    ->count();
        } while ($codeExists);

        return $code;
    }
}
