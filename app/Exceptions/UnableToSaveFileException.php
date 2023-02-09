<?php

namespace App\Exceptions;

use Throwable;

class UnableToSaveFileException extends BaseException implements ReportableException
{
    /**
     * SmsServiceNotAvailableException constructor.
     *
     * @param Throwable $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct('file:unable_to_save', 503, $previous);
    }
}
