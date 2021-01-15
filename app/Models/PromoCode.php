<?php

namespace App\Models;

use App\Support\Model;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class PromoCode
 * @package App\Models
 *
 * @property string code
 * @property int    expires_at
 * @property int    max_usage_count
 *
 * @property int admin_id
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Collection admin
 */
class PromoCode extends Model
{
    protected $dateFormat = 'U';

    /**
     * @return BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
