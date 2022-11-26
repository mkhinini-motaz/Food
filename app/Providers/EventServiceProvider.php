<?php

namespace App\Providers;

use App\Events\ShopMenuLangUpdated;
use App\Events\ShopMenuUpdated;
use App\Events\ClientRegistered;
use App\Events\OrderEvent;
use App\Listeners\Client\AttributePastOrdersToClient;
use App\Listeners\Shop\NotifyShopMenuLangUpdated;
use App\Listeners\Shop\NotifyShopMenuUpdated;
use App\Listeners\Client\AttributePointsToRegisteredClient;
use App\Listeners\Shop\NotifyForOrderAction;
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
        ],
        OrderEvent::class => [
            NotifyForOrderAction::class,
        ],
        ShopMenuUpdated::class => [
            NotifyShopMenuUpdated::class,
        ],
        ShopMenuLangUpdated::class => [
            NotifyShopMenuLangUpdated::class,
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
