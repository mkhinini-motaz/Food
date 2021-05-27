<?php

namespace App\Events;

use App\Models\Client;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClientRegistered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Client
     */
    public $registeredClient;

    /**
     * @var string
     */
    public $inviteCode;

    /**
     * Create a new event instance.
     *
     * @param Client $registeredClient
     * @param string $inviteCode
     */
    public function __construct(Client $registeredClient, $inviteCode)
    {
        $this->registeredClient = $registeredClient;
        $this->inviteCode = $inviteCode;
    }
}
