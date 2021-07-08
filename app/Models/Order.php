<?php

namespace App\Models;

use App\Support\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Shop
 * @package App\Models
 *
 * @property int    id
 * @property string status
 * @property string total_price
 * @property string associated_phone
 * @property string delivery_latitude
 * @property string delivery_longitude
 * @property string additional_note
 * @property int    source
 * @property int    collection_method
 * @property int    payment_method
 *
 * @property int client_id
 * @property int location_id
 * @property int promo_code_id
 * @property int transporter_id
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
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
    const STATUS_PICKED_BY_TRANSPORTER   = 5;

    const STATUS_DELIVERED = 10;
    const STATUS_CANCELED  = 99;

    const STATUSES = [ self::STATUS_NEW, self::STATUS_ACCEPTED_BY_SHOP, self::STATUS_READY_BY_SHOP, self::STATUS_ACCEPTED_BY_TRANSPORTER, self::STATUS_PICKED_BY_TRANSPORTER, self::STATUS_DELIVERED, self::STATUS_CANCELED, ];

    const ACTIVE_SHOP_STATUSES = [ self::STATUS_NEW, self::STATUS_ACCEPTED_BY_SHOP, self::STATUS_READY_BY_SHOP, self::STATUS_ACCEPTED_BY_TRANSPORTER ];

    const ACTIVE_TRANSPORTER_STATUSES = [ self::STATUS_NEW, self::STATUS_ACCEPTED_BY_SHOP, self::STATUS_READY_BY_SHOP, self::STATUS_ACCEPTED_BY_TRANSPORTER, self::STATUS_PICKED_BY_TRANSPORTER, ];

    const SOURCE_ONLINE  = 1;
    const SOURCE_ON_SITE = 2;

    const SOURCES = [ self::SOURCE_ONLINE, self::SOURCE_ON_SITE ];

    // TODO: type to_be_delivered, to_be_eaten_on_site, ... ????

    const PAYMENT_METHOD_CASH         = 1;
    const PAYMENT_METHOD_CREDIT_CARD  = 2;
    const PAYMENT_METHOD_ON_THE_HOUSE = 3;
    const PAYMENT_METHODS = [ self::PAYMENT_METHOD_CASH, self::PAYMENT_METHOD_CREDIT_CARD, self::PAYMENT_METHOD_ON_THE_HOUSE ];

    const COLLECTION_METHOD_PICK_UP = 1;
    const COLLECTION_METHOD_DELIVER = 2;

    const COLLECTION_METHODS = [ self::COLLECTION_METHOD_PICK_UP, self::COLLECTION_METHOD_DELIVER, ];


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
     * @return BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot([ 'id', 'product_count' ]);
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
            'products.ingredientCategories' => $orderByOrder,
            'products.ingredientCategories.ingredients',
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
        ]);
    }
}
