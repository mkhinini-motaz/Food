<?php

namespace App\Providers;

use App\Events\ClientRegistered;
use App\Events\OrderCreated;
use App\Listeners\Client\AttributePointsToRegisteredClient;
use App\Listeners\Shop\NotifyForNewOrder;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ClientRegistered::class => [
            AttributePointsToRegisteredClient::class,
//            AttributePointsToInviterClient::class, // TODO: user must make his first order to reward the inviter
        ],
        OrderCreated::class => [
            NotifyForNewOrder::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
