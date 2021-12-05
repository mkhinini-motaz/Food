<?php

namespace App\Listeners\Shop;

use App\Models\Shop;
use App\Events\ShopMenuUpdated;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Redis;

class NotifyShopMenuLangUpdated implements ShouldQueue
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
     * @param ShopMenuUpdated $event
     *
     * @return void
     */
    public function handle(ShopMenuUpdated $event)
    {
        $shopId = $event->shopId;
        /** @var Shop $shop */

        $redis = Redis::connection();
        $redis->publish('shop_' . $shopId . '.menu_lang_update', json_encode([]));
    }
}
