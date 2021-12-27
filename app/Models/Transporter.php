<?php

namespace App\Models;

use App\Support\Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Transporter
 * @package App\Models
 *
 * @property int    id
 * @property string alias
 * @property string first_name
 * @property string last_name
 * @property string password
 * @property string phone
 * @property string email
 * @property string shift_start_hour
 * @property string shift_end_hour
 *                                //TODO remove start & end
 * @property bool   is_available
 * @property bool   is_approved
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Collection orders
 */
class Transporter extends Authenticatable
{
    use HasFactory;

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
     * @return HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
