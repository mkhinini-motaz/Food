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

    // TODO: concider types ??

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
     * @param        $query
     * @param string $code
     * @param int    $excludedOrderId
     */
    public static function scopeWhereCodeIsUsable($query, $code, $excludedOrderId = null)
    {
        $query->whereIsUsable($excludedOrderId)
            ->where('code', '=', $code);
    }

    /**
     * @param     $query
     * @param int $excludedOrderId
     */
    public static function scopeWhereIsUsable($query, $excludedOrderId = null)
    {
        $whereOrderExcluded = ! $excludedOrderId ? '' : 'WHERE orders.id <> ' . $excludedOrderId . ' ';
        $query->leftJoin(
            \DB::raw(
                '((SELECT promo_code_id, COUNT(promo_code_id) AS orders_count ' .
                'FROM orders ' .
                $whereOrderExcluded .
                'GROUP by promo_code_id ' .
                ') AS usages )'
            ),
            'usages.promo_code_id',
            '=',
            'promo_codes.id'
        )
            ->selectRaw('promo_codes.*, usages.orders_count')
            ->whereRaw('COALESCE(max_usage_count, 1) > COALESCE(orders_count, 0)')
            ->where('expires_at', '>', time());
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
