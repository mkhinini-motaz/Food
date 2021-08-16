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
 */
class PromoCodeShopItem extends Model
{
    use HasFactory;

    const DEFAULT_POINTS_TO_VALUE = [
        50  => 2500,
        100 => 5000,
        190 => 10000,
        360 => 20000,
    ];

    protected $dateFormat = 'U';
}
