<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Support\Str;

/**
 * @mixin IdeHelperModel
 */
class Model extends BaseModel
{
    use DoesntConvertDates;

    protected $dateFormat = 'U';
}
