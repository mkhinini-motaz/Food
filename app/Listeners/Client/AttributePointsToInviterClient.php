<?php

namespace App\Listeners\Client;

use App\Events\ClientRegistered;
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
     * @param  ClientRegistered  $event
     * @return void
     */
    public function handle(ClientRegistered $event)
    {
        $registeredClient = $event->registeredClient;
        $inviteCode       = $event->inviteCode;
        $shopRepository = new ShopRepository($registeredClient->shop);
        $inviterClient = $shopRepository->findClientByInviteCode($inviteCode);
    }
}
