<?php

namespace App\Models;

use App\Support\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

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
 * @property string domain
 * @property string loyalty_action_rewards
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
 * @property Collection orders
 * @property Collection products
 */
class Shop extends Model
{
    use HasFactory;

    const TYPE_RESTAURANT = 1;
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
    protected $casts = [ 'loyalty_action_rewards' => 'array', ];

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
     * @return string
     */
    public static function defaultLoyaltyActionRewardsValue()
    {
        return json_encode([
            LoyaltyAction::TYPE_REGISTRATION                  => 50,
            LoyaltyAction::TYPE_FRIEND_INVITE                 => 10,
            LoyaltyAction::TYPE_FIRST_ORDER                   => 5,
            LoyaltyAction::TYPE_PRODUCT_BOUGHT                => 1, // TODO: dynamic by product
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
}
