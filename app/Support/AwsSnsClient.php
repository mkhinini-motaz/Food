<?php

namespace App\Support;

class AwsSnsClient
{
    /**
     * @param string $phone
     * @param string $message
     */
    public static function sendMessage($phone, $message)
    {
        $response = app('aws')->createClient('sns')
            ->publish([ 'PhoneNumber' => $phone, 'Message' => $message ]);

        dd($response->get('data'), $response->get('@metadata'));
    }
}
