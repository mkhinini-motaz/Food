<?php

namespace App\Models;

use App\Support\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PromoCodeValue
 *
 * @property int    id
 * @property int    points
 * @property int    reduction_amount
 * @property string currency
 *
 * @property int created_at
 * @property int updated_at
 *
 * @package App\Models
 * @mixin IdeHelperPromoCodeShopItem
 */
class PromoCodeShopItem extends Model
{
    use HasFactory;

    const DEFAULT_POINTS_TO_VALUE = [
        48  => 2000,
        107 => 5000,
        165 => 8000,
        243 => 12000,
        380 => 20000,
    ];

    protected $dateFormat = 'U';
}
