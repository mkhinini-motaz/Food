<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $dateFormat = 'U';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function transporters()
    {
        return $this->belongsToMany(Order::class);
    }

    public function currentTransporter()
    {

    }
}
