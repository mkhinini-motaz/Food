<?php

namespace App\Http\Middleware;

use App\Models\ShopUser;

class AuthenticateShop extends BaseAuthenticate
{
    protected $guard = 'shop';

    protected $entity = ShopUser::class;

    protected $appendFromEntityToRequest = 'shop';
}
