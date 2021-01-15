<?php

namespace App\Models;

use App\Support\Model;

/**
 * Class TransporterPayment
 * @package App\Model
 *
 * @property int id
 * @property string name
 * @property string description
 * @property integer amount
 *
 * @property int shop_id
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Transporter transporter
 */
class TransporterPayment extends Model
{
    protected $dateFormat = 'U';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transporter()
    {
        return $this->belongsTo(Transporter::class);
    }
}
