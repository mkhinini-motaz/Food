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
     * @param Client        $client
     * @param LoyaltyAction $loyaltyAction
     */
    private static function updateClientLoyaltyPointsCount(Client $client, LoyaltyAction $loyaltyAction)
    {
        $client->loyalty_points_count += $loyaltyAction->points_rewarded;
        $client->save();
    }
}
