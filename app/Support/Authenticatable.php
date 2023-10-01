<?php

namespace App\Support;

use Illuminate\Foundation\Auth\User;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @mixin IdeHelperAuthenticatable
 */
class Authenticatable extends User implements JWTSubject
{
    use DoesntConvertDates;

    protected $dateFormat = 'U';

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'entity' => get_called_class(),
        ];
    }
}
