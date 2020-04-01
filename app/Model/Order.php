<?php

namespace App\Model;

use App\Support\Model;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class Shop
 * @package App\Model
 *
 * @property int id
 * @property string name
 * @property string logo
 * @property string phone
 * @property int pricing_category
 * @property int min_order_price
 * @property string average_ready_minutes
 * @property bool is_approved
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
 * @property Client client
 * @property Location location
 * @property PromoCode promo_code
 * @property Transporter transporter
 * @property Collection products
 */
class Order extends Model
{
    const STATUS_NEW = 1;
    const STATUS_ACCEPTED_BY_SHOP = 2;
    const STATUS_READY_BY_SHOP = 3;
    const STATUS_ACCEPTED_BY_TRANSPORTER = 4;

    const STATUS_DELIVERED = 10;
    const STATUS_CANCELED = 99;

    const STATUSES = [ self::STATUS_NEW, self::STATUS_ACCEPTED_BY_SHOP, self::STATUS_READY_BY_SHOP, self::STATUS_ACCEPTED_BY_TRANSPORTER, self::STATUS_DELIVERED, self::STATUS_CANCELED ];

    protected $dateFormat = 'U';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function promoCode()
    {
        return $this->belongsTo(PromoCode::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transporter()
    {
        return $this->belongsTo(Transporter::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
