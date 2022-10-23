<?php

namespace App\Listeners\Client;

use App\Events\ClientRegistered;
use App\Models\Client;
use App\Repositories\ClientRepository;
use App\Repositories\LoyaltyActionRepository;
use Illuminate\Contracts\Queue\ShouldQueue;

class AttributePastOrdersToClient implements ShouldQueue
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
     * @param ClientRegistered $event
     * @return void
     */
    public function handle(ClientRegistered $event)
    {
        $client = Client::findOrFail($event->registeredClient->id);

        ClientRepository::associateOrdersByPhone([ $client->phone ]);
        LoyaltyActionRepository::createTypeOrderByPhone([ $client->phone ], true);
    }
}
