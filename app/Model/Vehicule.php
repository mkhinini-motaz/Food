<?php

namespace App\Model;

use App\Support\Model;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class Vehicule
 * @package App\Model
 *
 * @property int id
 * @property string name
 * @property string manufacturer
 * @property string model
 * @property int cylinder
 * @property int max_supported_weight
 * @property int max_supported_volume
 *
 * @property int purchased_at
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Collection currentTransporters
 */
class Vehicule extends Model
{
    protected $dateFormat = 'U';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function currentTransporters()
    {
        return $this->belongsToMany(Transporter::class)->wherePivot('usage_end_at', 'null');
    }
}
