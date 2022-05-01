<?php

namespace App\Models;

use App\Support\Model;
use App\Support\LogsActivity;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * @package App\Models
 *
 * @property int    id
 * @property int    status
 * @property string total_price
 * @property string associated_phone
 * @property string delivery_latitude
 * @property string delivery_longitude
 * @property string additional_note
 * @property int    source
 * @property int    type
 * @property int    payment_method
 * @property bool   is_payed
 *
 * @property int client_id
 * @property int location_id
 * @property int promo_code_id
 * @property int transporter_id
 * @property int shop_transporter_id
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Order       client
 * @property Location    location
 * @property PromoCode   promo_code
 * @property Transporter transporter
 * @property ShopUser    shopTransporter
 * @property Choice[]    choices
 */
class Order extends Model
{
    use SoftDeletes, HasFactory, LogsActivity;

    const STATUS_NEW                     = 1;
    const STATUS_ACCEPTED_BY_SHOP        = 2;
    const STATUS_PROCESSING_BY_SHOP      = 3;
    const STATUS_READY_BY_SHOP           = 4;
    const STATUS_REFUSED_BY_SHOP         = 5;
    const STATUS_ACCEPTED_BY_TRANSPORTER = 10;
    const STATUS_PICKED_BY_TRANSPORTER   = 11;
    const STATUS_DELIVERED               = 20;
    const STATUS_CANCELED                = 21;
    const STATUS_CLIENT_NOT_FOUND        = 22;
//TODO: STATUS delayed due to weather && out capacity ===> client can cancel

    const STATUSES = [ self::STATUS_NEW, self::STATUS_ACCEPTED_BY_SHOP, self::STATUS_PROCESSING_BY_SHOP, self::STATUS_READY_BY_SHOP, self::STATUS_REFUSED_BY_SHOP, self::STATUS_ACCEPTED_BY_TRANSPORTER, self::STATUS_PICKED_BY_TRANSPORTER, self::STATUS_DELIVERED, self::STATUS_CANCELED, self::STATUS_CLIENT_NOT_FOUND, ];

    const ACTIVE_SHOP_STATUSES = [ self::STATUS_NEW, self::STATUS_ACCEPTED_BY_SHOP, self::STATUS_PROCESSING_BY_SHOP, self::STATUS_READY_BY_SHOP, self::STATUS_ACCEPTED_BY_TRANSPORTER, ];

    const ACTIVE_TRANSPORTER_STATUSES = [ self::STATUS_NEW, self::STATUS_ACCEPTED_BY_SHOP, self::STATUS_READY_BY_SHOP, self::STATUS_ACCEPTED_BY_TRANSPORTER, self::STATUS_PICKED_BY_TRANSPORTER, ];

    const SOURCE_ONLINE  = 1;
    const SOURCE_ON_SITE = 2;

    const SOURCES = [ self::SOURCE_ONLINE, self::SOURCE_ON_SITE ];

    const TYPE_ON_SITE   = 1;
    const TYPE_TAKE_AWAY = 2;
    const TYPE_DELIVERY  = 3;

    const TYPES = [ self::TYPE_ON_SITE, self::TYPE_TAKE_AWAY, self::TYPE_DELIVERY ];

    const PAYMENT_METHOD_CASH         = 1;
    const PAYMENT_METHOD_CREDIT_CARD  = 2;
    const PAYMENT_METHOD_ON_THE_HOUSE = 3;
    const PAYMENT_METHODS = [ self::PAYMENT_METHOD_CASH, self::PAYMENT_METHOD_CREDIT_CARD, self::PAYMENT_METHOD_ON_THE_HOUSE ];

    protected $dateFormat = 'U';

    /**
     * @return BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
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
     * @return BelongsTo
     */
    public function shopTransporter()
    {
        return $this->belongsTo(ShopUser::class, 'shop_transporter_id');
    }

    /**
     * @return HasMany
     */
    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeWithNeededRelationsForProcessing($query)
    {
        $orderByOrder = function($query) { $query->orderBy('pivot_order'); };

        return $query->with([
            'client',
            'promoCode',
            'transporter',
            'shopTransporter',
            'choices.product.optionGroups' => $orderByOrder,
            'choices.product.optionGroups.options',
            'choices.product.category',
            'choices.options',
        ]);
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeWithNeededRelationsForTransporting($query)
    {
        return $query->with([
            'client',
            'products.category',
        ]);
    }
    /**
     * Appends additional data to the activity log
     *
     * @param ActivityLog $activityLog
     * @param string      $eventName
     */
    public function tapActivity(ActivityLog $activityLog, string $eventName)
    {
        $activityLog->shop_id = $this->location->shop_id;
    }
}
