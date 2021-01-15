<?php

namespace App\Models;

use App\Support\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class TransporterPayment
 * @package App\Models
 *
 * @property int    id
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
     * @return BelongsTo
     */
    public function transporter()
    {
        return $this->belongsTo(Transporter::class);
    }
}
