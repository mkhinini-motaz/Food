<?php

namespace App\Model;

use App\Support\Authenticatable;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Client
 * @package App\Model
 *
 * @property int    id
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string password
 * @property string phone
 * @property string latitude
 * @property string longitude
 * @property int    last_login_at
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Collection orders
 */
class Client extends Authenticatable
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
     * @return BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
