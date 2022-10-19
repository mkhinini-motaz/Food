<?php

namespace App\Listeners\Client;

use App\Events\ClientRegistered;
use App\Repositories\LoyaltyActionRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AttributePointsToRegisteredClient
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
        $registeredClient = $event->registeredClient;

        LoyaltyActionRepository::createTypeRegistration($registeredClient);
    }
}
