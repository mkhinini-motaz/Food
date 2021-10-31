<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderCreated
{
    use Dispatchable, SerializesModels;

    /**
     * @var int
     */
    public $orderId;

    /**
     * Create a new event instance.
     *
     * @param $orderId
     */
    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }
}
