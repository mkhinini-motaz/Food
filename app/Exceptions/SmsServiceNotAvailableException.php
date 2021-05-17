<?php

namespace App\Exceptions;

use Throwable;

class SmsServiceNotAvailableException extends BaseException implements ReportableException
{
    /**
     * SmsServiceNotAvailableException constructor.
     *
     * @param Throwable $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct('sms:service:unavailable', 503, $previous);
    }
}
