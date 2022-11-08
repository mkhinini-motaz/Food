<?php

namespace App\Models;

use App\Casts\Json;
use App\Support\LogsActivity;
use App\Support\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use function App\Support\Helpers\pointInPolygon;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Shop
 * @package App\Models
 *
 * @property int    id
 * @property string name
 * @property int    type
 * @property string logo
 * @property string phone
 * @property int    pricing_category
 * @property int    min_order_price
 * @property string average_ready_minutes
 * @property bool   is_approved
 * @property bool   signup_is_open
 * @property array  service_area
 * @property array  working_hours
 * @property string domain
 * @property array  loyalty_action_rewards
 * @property string menu_displayed_lang
 * @property string ga_tracking_id
 * @property string primary_color
 * @property string secondary_color
 * @property string facebook_url
 * @property string instagram_url
 * @property string twitter_url
 * @property string linkedin_url
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Collection categories
 * @property Collection options
 * @property Collection shopTransporters
 * @property Collection locations
 * @property Collection orders
 * @property Collection products
 * @property Collection activityLogs
 * @mixin IdeHelperShop
 */
class Shop extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    const TYPE_RESTAURANT = 1;
    // TODO: grocery
    // TODO: butcher
    // TODO: chicken
    // TODO: hardware
    // TODO: services
    const TYPES = [ self::TYPE_RESTAURANT ];

    const IS_APPROVED_FALSE = 0;
    const IS_APPROVED_TRUE = 1;
    const IS_APPROVED_VALUES = [ self::IS_APPROVED_FALSE, self::IS_APPROVED_TRUE ];

    const PRICING_CATEGORY_VERY_LOW  = 1;
    const PRICING_CATEGORY_LOW       = 2;
    const PRICING_CATEGORY_MEDIUM    = 3;
    const PRICING_CATEGORY_HIGH      = 4;
    const PRICING_CATEGORY_VERY_HIGH = 5;

    const PRICING_CATEGORIES = [ self::PRICING_CATEGORY_VERY_LOW, self::PRICING_CATEGORY_LOW, self::PRICING_CATEGORY_MEDIUM, self::PRICING_CATEGORY_HIGH, self::PRICING_CATEGORY_VERY_HIGH ];

    protected $dateFormat = 'U';
    protected $casts = [
        'service_area'           => 'array',
        'working_hours'          => Json::class,
        'loyalty_action_rewards' => Json::class,
    ];

    /**
     * @return BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * @return HasMany
     */
    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    /**
     * @return HasMany
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * @return HasMany
     */
    public function options()
    {
        return $this->hasMany(Option::class);
    }

    /**
     * @return HasManyThrough
     */
    public function products()
    {
        return $this->hasManyThrough(Product::class, Category::class);
    }

    /**
     * @return HasManyThrough
     */
    public function orders()
    {
        return $this->hasManyThrough(Order::class, Location::class);
    }

    /**
     * @return HasManyThrough
     */
    public function activeOrders()
    {
        return $this->orders()
            ->whereIn('status', Order::ACTIVE_TRANSPORTER_STATUSES);
    }

    /**
     * @return HasMany
     */
    public function promoCodes()
    {
        return $this->hasMany(PromoCode::class);
    }

    /**
     * @return HasMany
     */
    public function shopTransporters()
    {
        return $this->hasMany(ShopUser::class)
            ->whereIn('role', ShopUser::ROLES_CAN_TRANSPORT);
    }

    /**
     * @return HasMany
     */
    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    /**
     * @param string $latitude
     * @param string $longitude
     *
     * @return EloquentModel|Location
     */
    public function nearestLocation($latitude, $longitude)
    {
        return $this->locations()->first(); // TODO: implement
    }

    /**
     * @return HasMany
     */
    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

    /**
     * @param float $latitude
     * @param float $longitude
     *
     * @return bool
     */
    public function locationWithinServiceArea($latitude, $longitude)
    {
        return pointInPolygon([ $latitude, $longitude ], $this->service_area);
    }

    /**
     * @param float $latitude
     * @param float $longitude
     *
     * @return bool
     */
    public function locationNotWithinServiceArea($latitude, $longitude)
    {
        return ! $this->locationWithinServiceArea($latitude, $longitude);
    }

    /**
     * @param int $categoryId
     *
     * @return bool
     */
    public function isLastVisibleCategory($categoryId)
    {
        return 0 === $this->categories()
            ->where('id', '<>', $categoryId)
            ->where('is_visible', '=', 0)
            ->count();
    }

    /**
     * @param int $categoryId
     *
     * @return bool
     */
    public function isNotLastVisibleCategory($categoryId)
    {
        return ! $this->isLastVisibleCategory($categoryId);
    }

    /**
     * @param LoyaltyAction $loyaltyAction
     *
     * @return int
     */
    public function pointsRewardedForLoyaltyAction(LoyaltyAction $loyaltyAction)
    {
        if (! isset($this->loyalty_action_rewards[$loyaltyAction->type])) {
            throw new \InvalidArgumentException('Loyalty action type "' . $loyaltyAction->type . '" is not valid or is not calculated in shop ' . $this->id);
        }

        return $this->loyalty_action_rewards[$loyaltyAction->type];
    }

    /**
     * @param int $isShopApproved
     *
     * @return \Closure
     */
    public static function withIsApprovedEquals($isShopApproved)
    {
        return function ($query) use ($isShopApproved) {
            $query->where('is_approved', '=', $isShopApproved);
        };
    }

    /**
     * @param $query
     */
    public static function scopeIsApproved($query)
    {
        $query->where('is_approved', '=', self::IS_APPROVED_TRUE);
    }

    /**
     * @return string
     */
    public static function defaultLoyaltyActionRewardsValue()
    {
        return json_encode([
            LoyaltyAction::TYPE_REGISTRATION                  => 10,
            LoyaltyAction::TYPE_FRIEND_INVITE                 => 7,
            LoyaltyAction::TYPE_FIRST_ORDER                   => 5,

            LoyaltyAction::TYPE_ONLINE_ORDER_COUNT_FOR_MONTH  => 1,
            LoyaltyAction::TYPE_ON_SITE_ORDER_COUNT_FOR_MONTH => 1,
            LoyaltyAction::TYPE_SUBMIT_FEEDBACK               => 1,
            LoyaltyAction::TYPE_BIRTHDAY_GIFT                 => 1,
            LoyaltyAction::TYPE_PROMO_CODE_BOUGHT             => 1,
            LoyaltyAction::TYPE_SHOP_REWARD                   => 1,
            LoyaltyAction::TYPE_SEND_POINTS                   => 1,
            LoyaltyAction::TYPE_RECEIVE_POINTS                => 1,
        ]);
    }

    /**
     * @return string { 'points' => 'money' }
     */
    public static function defaultPromoCodeShopItemsValue()
    {
        return json_encode([
            50  => 2500,
            100 => 5000,
            190 => 10000,
            360 => 20000,
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
        $activityLog->shop_id = $this->shop_id;
    }

    /**
     * @param string $dateTime
     *
     * @return array
     */
    public function workingHoursForDate(string $dateTime)
    {
        $date = date('d-m-Y', strtotime($dateTime)) . ' ';
        // TODO: consider creating a schedule model
        $workingHours = $this->working_hours[date('w', strtotime($dateTime))];

        if (! $workingHours) {
            return [];
        }

        $start         = strtotime($date . $workingHours->start);
        $end           = strtotime($date . $workingHours->end);
        $midnight      = strtotime($date . '00:00');
        $dateTimestamp = strtotime($dateTime);

        if ($end > $midnight && $start > $end) {
            if (
                $dateTimestamp > $midnight &&
                $dateTimestamp < $end
            ) {
                $start = strtotime('-1 day', $start);
            } else {
                $end = strtotime('+1 day', $end);
            }
        }

        return [ $start, $end ];
    }
}
