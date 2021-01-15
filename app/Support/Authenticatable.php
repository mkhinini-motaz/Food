<?php

namespace App\Support;

use Illuminate\Foundation\Auth\User;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Authenticatable extends User implements JWTSubject
{
    protected $dateFormat = 'U';

    /**
     * Add the date attributes to the attributes array.
     * Overridden to prevent casting dates when toArray is invoked, new in laravel 7
     *
     * @param array $attributes
     *
     * @return array
     */
    protected function addDateAttributesToArray(array $attributes)
    {
        return $attributes;
    }

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
