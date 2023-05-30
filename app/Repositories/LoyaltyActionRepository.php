<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\LoyaltyAction;
use App\Models\Order;
use App\Models\PromoCodeShopItem;
use Illuminate\Support\Collection;

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
     * @param Client $client
     * @param int    $awardedPoints
     *
     * @return LoyaltyAction
     */
    public static function createTypeLoyaltyBonus(Client $client, int $awardedPoints)
    {
        $loyaltyAction = new LoyaltyAction();

        $loyaltyAction->type            = LoyaltyAction::TYPE_LOYALTY_BONUS;
        $loyaltyAction->client_id       = $client->id;
        $loyaltyAction->points_rewarded = $awardedPoints;

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
     * @param Collection|array $phones
     * @param bool             $shouldNotIncludeToday
     *
     * @return int
     */
    public static function createTypeOrderByPhone($phones, $shouldNotIncludeToday = false)
    {
        $orders = Order::query()
            ->whereNotIn('status', Order::CANCELED_STATUSES)
            ->whereIn('associated_phone', $phones);
        if ($shouldNotIncludeToday) {
            $orders->where('created_at', '<', strtotime(date('H') > 10 ? 'today 10:00' : 'yesterday 03:00'));
        }

        $orders = $orders->get();
        if ($orders->isEmpty()) {
            return 0;
        }

        $ordersPointsSum = 0;
        foreach ($orders as $order) {
            $ordersPointsSum += LoyaltyActionRepository::createTypeOrder($order)
                ->points_rewarded ?? 0;
        }

        return $ordersPointsSum;
    }

    /**
     * @param Collection $phones
     *
     * @return int
     */
    public static function createTypeLoyaltyBonusByPhone(Collection $phones)
    {
        $pointsAwarded = LoyaltyAction::POINTS_AWARDED_BY_TYPE[LoyaltyAction::TYPE_LOYALTY_BONUS];
        $clientIds = Client::query()
            ->whereIn('phone', $phones)
            ->pluck('id');

        $loyaltyActions = [];
        foreach ($clientIds as $clientId) {
            $loyaltyActions[] = [
                'type' => LoyaltyAction::TYPE_LOYALTY_BONUS,
                'client_id' => $clientId,
                'points_rewarded' => $pointsAwarded,
                'created_at' => time(),
                'updated_at' => time(),
            ];
        }

        LoyaltyAction::query()->insert($loyaltyActions);
        return $pointsAwarded * count($clientIds);
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
