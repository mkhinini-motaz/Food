<?php

namespace App\Http\Middleware;

use App\Models\Client;

class AuthenticateClient extends BaseAuthenticate
{
    protected $guard = 'client';

    protected $entity = Client::class;
}
