<?php

namespace App\Http\Middleware;

use App\Models\Transporter;

class AuthenticateTransporter extends BaseAuthenticate
{
    protected $guard = 'transporter';

    protected $entity = Transporter::class;

    protected $appendFromEntityToRequest = null;
}
