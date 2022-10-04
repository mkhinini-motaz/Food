<?php

namespace App\Listeners\Client;

use App\Events\OrderAction;
use App\Models\Client;
use App\Events\ClientRegistered;
use App\Models\Order;
use App\Repositories\LoyaltyActionRepository;
use App\Repositories\ShopRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AttributePointsToInviterClient implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param OrderAction $event
     * @return void
     */
    public function handle(OrderAction $event)
    {
        $order = Order::findOrFail($event->orderId);
        $client = $order->client;
        if (! $client || ! $client->inviterClient || 1 < $client->orders()->count()) {
            return;
        }

        LoyaltyActionRepository::createTypeFriendInvite($client->inviterClient, $client);
    }
}
