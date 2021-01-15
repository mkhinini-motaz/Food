<?php

namespace App\Models;

use App\Support\Authenticatable;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class Transporter
 * @package App\Model
 *
 * @property int id
 * @property string alias
 * @property string first_name
 * @property string last_name
 * @property string password
 * @property string phone
 * @property string email
 * @property string shift_start_hour
 * @property string shift_end_hour
 * @property bool is_approved
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Collection orders
 * @property Collection currentVehicules
 */
class Transporter extends Authenticatable
{
    protected $dateFormat = 'U';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function currentVehicules()
    {
        return $this->belongsToMany(Vehicule::class)->wherePivot('usage_end_at', 'null');
    }
}
