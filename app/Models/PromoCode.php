<?php

namespace App\Models;

use App\Support\Model;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class PromoCode
 * @package App\Model
 *
 * @property string code
 * @property int expires_at
 * @property int max_usage_count
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
