<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    use DoesntConvertDates;

    protected $dateFormat = 'U';

    /**
     * @return string
     */
    public static function getDbTableName()
    {
        return (new self)->getTable();
    }
}
