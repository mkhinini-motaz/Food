<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\LoyaltyAction;
use App\Models\Order;
use App\Models\PromoCodeShopItem;

class LoyaltyActionRepository
{
    /**
     * @var LoyaltyAction
     */
    private $loyaltyAction;

    /**
     * LoyaltyActionRepository constructor.
     *
     * @param LoyaltyAction $loyaltyAction
     */
    public function __construct(LoyaltyAction $loyaltyAction)
    {
        $this->loyaltyAction = $loyaltyAction;
    }

    /**
     * @param Client $client
     */
    public static function createTypeRegistration(Client $client)
    {
        $loyaltyAction = new LoyaltyAction();

        $loyaltyAction->type            = LoyaltyAction::TYPE_REGISTRATION;
        $loyaltyAction->client_id       = $client->id;
        $loyaltyAction->points_rewarded = $loyaltyAction->calculatePointsRewarded();

        $loyaltyAction->save();

        self::updateClientLoyaltyPointsCount($client, $loyaltyAction);
    }

    /**
     * @param Client $inviterClient
     * @param Client $newlyRegisteredClient
     *
     * @return LoyaltyAction
     */
    public static function createTypeFriendInvite(Client $inviterClient, Client $newlyRegisteredClient)
    {
        $loyaltyAction = new LoyaltyAction();

        $loyaltyAction->type            = LoyaltyAction::TYPE_FRIEND_INVITE;
        $loyaltyAction->meta            = json_encode([ 'invited_client_id' => $newlyRegisteredClient->id ]);
        $loyaltyAction->client_id       = $inviterClient->id;
        $loyaltyAction->points_rewarded = $loyaltyAction->calculatePointsRewarded();

        $loyaltyAction->save();

        self::updateClientLoyaltyPointsCount($inviterClient, $loyaltyAction);

        return $loyaltyAction;
    }

    /**
     * @param Client            $client
     * @param PromoCodeShopItem $promoCodeShopItem
     *
     * @return LoyaltyAction
     */
    public static function createTypePromoCodeBought(Client $client, PromoCodeShopItem $promoCodeShopItem)
    {

        $loyaltyAction = new LoyaltyAction();

        $loyaltyAction->type            = LoyaltyAction::TYPE_PROMO_CODE_BOUGHT;
        $loyaltyAction->client_id       = $client->id;
        $loyaltyAction->points_rewarded = -$promoCodeShopItem->points;

        $loyaltyAction->save();

        self::updateClientLoyaltyPointsCount($client, $loyaltyAction);

        return $loyaltyAction;
    }

    /**
     * @param Order $order
     *
     * @return LoyaltyAction
     */
    public static function createTypeOrder(Order $order)
    {
        if (! $order->client_id) {
            throw new \InvalidArgumentException('Order doesn\'t have a client');
        }

        $pointsRewarded = $order->awardedPoints();
        if ($pointsRewarded === 0) {
            return null;
        }

        $loyaltyAction = new LoyaltyAction();

        $loyaltyAction->type            = LoyaltyAction::TYPE_ORDER;
        $loyaltyAction->meta            = json_encode([ 'order_id' => $order->id ]);
        $loyaltyAction->client_id       = $order->client_id;
        $loyaltyAction->points_rewarded = $pointsRewarded;
        $loyaltyAction->created_at      = $order->created_at;
        $loyaltyAction->updated_at      = $order->updated_at;

        $loyaltyAction->save();

        self::updateClientLoyaltyPointsCount($order->client, $loyaltyAction);

        return $loyaltyAction;
    }

    /**
     * @param Client        $client
     * @param LoyaltyAction $loyaltyAction
     */
    private static function updateClientLoyaltyPointsCount(Client $client, LoyaltyAction $loyaltyAction)
    {
        $client->loyalty_points_count += $loyaltyAction->points_rewarded;
        $client->save();
    }
}
