<?php

namespace App\Models;

use App\Support\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Shop
 * @package App\Models
 *
 * @property int    id
 * @property string name
 * @property string logo
 * @property string phone
 * @property int    min_order_price
 * @property string average_ready_minutes
 * @property bool   is_approved
 *
 * @property int         client_id
 * @property int         location_id
 * @property int         promo_code_id
 * @property int         transporter_id
 *
 * @property int         created_at
 * @property int         updated_at
 * @property int         deleted_at
 *
 * @property Order       client
 * @property Location    location
 * @property PromoCode   promo_code
 * @property Transporter transporter
 * @property Collection  products
 */
class Order extends Model
{
    use HasFactory;

    const STATUS_NEW                     = 1;
    const STATUS_ACCEPTED_BY_SHOP        = 2;
    const STATUS_READY_BY_SHOP           = 3;
    const STATUS_ACCEPTED_BY_TRANSPORTER = 4;

    const STATUS_DELIVERED = 10;
    const STATUS_CANCELED  = 99;

    const STATUSES = [ self::STATUS_NEW, self::STATUS_ACCEPTED_BY_SHOP, self::STATUS_READY_BY_SHOP, self::STATUS_ACCEPTED_BY_TRANSPORTER, self::STATUS_DELIVERED, self::STATUS_CANCELED ];

    protected $dateFormat = 'U';

    /**
     * @return BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @return BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * @return BelongsTo
     */
    public function promoCode()
    {
        return $this->belongsTo(PromoCode::class);
    }

    /**
     * @return BelongsTo
     */
    public function transporter()
    {
        return $this->belongsTo(Transporter::class);
    }

    /**
     * @return BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot([ 'id', 'product_count' ]);
    }
}
