<?php

namespace App\Providers;

use App\Events\ShopMenuLangUpdated;
use App\Events\ShopMenuUpdated;
use App\Events\ClientRegistered;
use App\Events\OrderAction;
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
//            AttributePointsToInviterClient::class, // TODO: user must make his first order to reward the inviter
        ],
        OrderAction::class => [
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
