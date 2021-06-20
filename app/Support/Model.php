<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    use DoesntConvertDates;

    protected $dateFormat = 'U';

    /**
     * Add the date attributes to the attributes array.
     * Overridden to prevent casting dates when toArray is invoked, new in laravel 7
     *
     * @param array $attributes
     * @return array
     */
    protected function addDateAttributesToArray(array $attributes)
    {
        return $attributes;
    }

    /**
     * Return a timestamp as DateTime object.
     * Overridden to prevent casting dates when getAttribute is invoked, new in laravel 7
     *
     * @param mixed $value
     * @return mixed
     */
    protected function asDateTime($value)
    {
        return $value;
    }

    /**
     * @return string
     */
    public static function getDbTableName()
    {
        return (new self)->getTable();
    }
}
