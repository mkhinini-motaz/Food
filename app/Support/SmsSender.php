<?php

namespace App\Support;

use App\Exceptions\SmsServiceNotAvailableException;

interface SmsSender
{
    /**
     * @param string $phone
     * @param string $message
     *
     * @throws SmsServiceNotAvailableException
     */
    public function sendMessage($phone, $message);
}
