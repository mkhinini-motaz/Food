<?php

namespace App\Listeners\Shop;

use App\Events\OrderEvent;
use App\Models\Order;
use App\Repositories\OrderRepository;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Redis;

class NotifyForOrderAction implements ShouldQueue
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
     * @param OrderEvent $event
     *
     * @return void
     */
    public function handle(OrderEvent $event)
    {
        $orderId = $event->orderId;
        /** @var Order $order */
        $order = Order::findOrFail($orderId);

        $orderRepo = new OrderRepository($order);
        $shopIds = $orderRepo->productsShopIds();

        $redis = Redis::connection();
        foreach ($shopIds as $shopId) {
            $redis->publish(
                'shop_' . $shopId . '.order_update',
                json_encode([
                    'orderId'           => $orderId,
                    'shopTransporterId' => $order->shop_transporter_id,
                ])
            );
        }
    }
}
