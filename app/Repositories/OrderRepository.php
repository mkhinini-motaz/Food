<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Transporter;

class OrderRepository
{
    /**
     * @var Order
     */
    private $order;

    /**
     * OrderRepository constructor.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * @param Transporter $transporter
     */
    public function attachTransporter(Transporter $transporter)
    {
        $this->order->transporter_id = $transporter->id;
        $this->order->save();
    }
}
