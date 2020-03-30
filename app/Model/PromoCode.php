<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

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
