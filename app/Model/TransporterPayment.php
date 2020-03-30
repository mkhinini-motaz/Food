<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TransporterPayment extends Model
{
    protected $dateFormat = 'U';

    public function transporter()
    {
        return $this->belongsTo(Transporter::class);
    }
}
