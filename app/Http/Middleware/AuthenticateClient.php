<?php

namespace App\Http\Middleware;

use App\Models\Client;

class AuthenticateClient extends BaseAuthenticate
{
    protected $guard = 'clients';

    protected $entity = Client::class;
}
