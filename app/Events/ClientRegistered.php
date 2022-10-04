<?php

namespace App\Events;

use App\Models\Client;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClientRegistered
{
    use Dispatchable, SerializesModels;

    /**
     * @var Client
     */
    public $registeredClient;

    /**
     * Create a new event instance.
     *
     * @param Client      $registeredClient
     */
    public function __construct(Client $registeredClient)
    {
        $this->registeredClient = $registeredClient;
    }
}
