<?php

namespace App\Models;

use App\Support\Model;
use App\Support\HasTranslations;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Service
 * @package App\Models
 *
 * @property int    id
 * @property string name
 * @property string photo
 * @property int    service_area_id
 *
 * @property int created_at
 * @property int updated_at
 *
 * @property Collection  shops
 * @property ServiceArea serviceArea
 *
 * @mixin IdeHelperService
 */
class Service extends Model
{
    use HasFactory, HasTranslations;

    protected $dateFormat = 'U';

    public $translatable = [ 'name' ];

    /**
     * @return HasMany
     */
    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    /**
     * @return BelongsTo
     */
    public function serviceArea()
    {
        return $this->belongsTo(ServiceArea::class);
    }
}
