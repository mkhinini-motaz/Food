<?php

namespace App\Support;

use App\Exceptions\SmsServiceNotAvailableException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class OrangeSmsSender
{
    const AUTH_CACHE_KEY = 'orange_auth';
    /**
     * @var Client
     */
    protected $guzzleClient;

    /**
     * OrangeSmsSender constructor
     */
    public function __construct()
    {
        $this->guzzleClient = new Client();
    }

    /**
     * @param string $phone
     * @param string $message
     *
     * @throws GuzzleException
     * @throws SmsServiceNotAvailableException
     */
    public function sendMessage($phone, $message) // TODO: add shop
    {
        $from = config('sms.from'); // TODO: get from shop
        if (! \Cache::get(self::AUTH_CACHE_KEY)) {
            $this->login();
        }

        $url      = 'https://api.orange.com/smsmessaging/v1/outbound/' . $from . '/requests';
        $authData = \Cache::get(self::AUTH_CACHE_KEY);
        $apiCallConfig = [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => $authData['token_type'] . ' ' . $authData['access_token'],
            ],
            'json' => [
                'outboundSMSMessageRequest' => [
                    'address'                => "tel:{$phone}",
                    'senderAddress'          => $from,
                    'outboundSMSTextMessage' => [
                        'message' => $message,
                    ],
                ],
            ],
        ];

        try {
            $this->guzzleClient->request('POST', $url, $apiCallConfig);
        } catch (GuzzleException $exception) {
            throw new SmsServiceNotAvailableException($exception);
        }
    }

    /**
     * @throws GuzzleException
     */
    public function login()
    {
        $url = 'https://api.orange.com/oauth/v3/token';
        $apiCallConfig = [
            'headers' => [
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/x-www-form-urlencoded',
                'Authorization' => config('sms.orange_auth_header'),
            ],
            'form_params' => [
                'grant_type' => 'client_credentials',
            ]
        ];

        $response = $this->guzzleClient->request('POST', $url, $apiCallConfig);
        $responseData = json_decode($response->getBody()->getContents(), true);
        $responseData['expires_at'] = time() + $responseData['expires_in'];

        \Cache::set(self::AUTH_CACHE_KEY, $responseData, $responseData['expires_in']);
    }
}
