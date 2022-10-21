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
 * @mixin IdeHelperPromoCode
 */
class PromoCode extends Model
{
    use HasFactory;

    // TODO: types ??

    const DEFAULT_LENGTH                  = 10;
    const DEFAULT_EXPIRE_AFTER_FOR_CLIENT = '2 months';

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

        return isset($promoCode) && ($promoCode->max_usage_count ?? 1) > $promoCode->orders_count;
    }

    /**
     * @param int $promoCodeId
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

    /**
     * @return bool
     */
    public function getIsUsableAttribute()
    {
        if ($this->expires_at < time()) {
            return false;
        }

        $maxUsageCount = $this->max_usage_count ?? 1;

        return $this->orders_count < $maxUsageCount;
    }
}
