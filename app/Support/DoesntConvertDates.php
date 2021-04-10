<?php

namespace App\Support;

trait DoesntConvertDates
{
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
}
