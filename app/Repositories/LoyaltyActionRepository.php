<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\LoyaltyAction;

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
     *
     * @return LoyaltyAction
     */
    public static function createTypeRegistration(Client $client)
    {
        $shop          = $client->shop;
        $loyaltyAction = new LoyaltyAction();

        $loyaltyAction->type            = LoyaltyAction::TYPE_REGISTRATION;
        $loyaltyAction->client_id       = $client->id;
        $loyaltyAction->points_rewarded = $shop->pointsRewardedForLoyaltyAction($loyaltyAction);

        $loyaltyAction->save();

        self::updateClientLoyaltyPointsCount($client, $loyaltyAction);

        return $loyaltyAction;
    }

    /**
     * @param Client $inviterClient
     * @param Client $newlyRegisteredClient
     *
     * @return LoyaltyAction
     */
    public static function createTypeFriendInvite(Client $inviterClient, Client $newlyRegisteredClient)
    {
        if ($inviterClient->shop_id !== $newlyRegisteredClient->shop_id) {
            throw new \InvalidArgumentException('Clients must have the same shop');
        }

        $shop          = $inviterClient->shop;
        $loyaltyAction = new LoyaltyAction();

        $loyaltyAction->type            = LoyaltyAction::TYPE_FRIEND_INVITE;
        $loyaltyAction->meta            = json_encode([ 'invited_client_id' => $newlyRegisteredClient->id ]);
        $loyaltyAction->client_id       = $inviterClient->id;
        $loyaltyAction->points_rewarded = $shop->pointsRewardedForLoyaltyAction($loyaltyAction);

        $loyaltyAction->save();

        self::updateClientLoyaltyPointsCount($inviterClient, $loyaltyAction);

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
