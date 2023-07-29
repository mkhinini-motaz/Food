<?php

namespace App\Models;

use App\Support\HasTranslations;
use App\Support\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class ServiceArea
 * @package App\Models
 *
 * @property int    id
 * @property string name
 * @property int    delivery_fee
 * @property int    service_fee
 * @property array  area
 *
 * @property int created_at
 * @property int updated_at
 *
 * @mixin IdeHelperClient
 */
class ServiceArea extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [ 'name' ];
    protected $dateFormat = 'U';
    protected $casts = [
        'area' => 'array',
    ];

    /**
     * @return HasMany
     */
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
