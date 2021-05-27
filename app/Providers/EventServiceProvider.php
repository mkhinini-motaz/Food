<?php

namespace App\Providers;

use App\Events\ClientRegistered;
use App\Listeners\Client\AttributePointsToInviterClient;
use App\Listeners\Client\AttributePointsToRegisteredClient;
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
            AttributePointsToInviterClient::class,
            AttributePointsToRegisteredClient::class,
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
