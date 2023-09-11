<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Models\Transporter;

class AuthenticateAdmin extends BaseAuthenticate
{
    protected $guard = 'admin';

    protected $entity = Admin::class;

    protected $appendFromEntityToRequest = null;
}
