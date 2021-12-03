<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ShopMenuUpdated
{
    use Dispatchable, SerializesModels;

    /**
     * @var int
     */
    public $shopId;

    /**
     * Create a new event instance.
     *
     * @param $shopId
     */
    public function __construct($shopId)
    {
        $this->shopId = $shopId;
    }
}
