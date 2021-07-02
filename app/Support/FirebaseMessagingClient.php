<?php

namespace App\Support;

use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging;
use Kreait\Firebase\Messaging\CloudMessage;

class FirebaseMessagingClient implements MessagingClientInterface
{
    /**
     * @var Messaging
     */
    protected $messaging;

    /**
     * FirebaseClient constructor
     */
    public function __construct()
    {
        $this->messaging = (new Factory())
            ->withServiceAccount(base_path('firebaseKey.json'))
            ->withDisabledAutoDiscovery()
            ->createMessaging();
    }

    /**
     * pushes a new notification to the firebase server
     *
     * @param string $deviceToken
     * @param string $type
     * @param string $title
     * @param string $content
     * @param string $body
     *
     * @return bool
     */
    public function pushNotification($deviceToken, $type, $title, $content, $body)
    {
        $message = CloudMessage::fromArray([
            'token'    => $deviceToken,
            'priority' => 'high',
            'data' => [
                'type'     => $type,
                'title'    => $title,
                'content'  => $content,
                'body'     => $body,
                'priority' => 'high',
            ],
            'android' => [
                'ttl' => '3600s',
            ],
            'apns' => [
                'payload' => [
                    'aps' => [
                        'alert' => [
                            'type'    => $type,
                            'title'   => $title,
                            'body'    => $content,
                            'content' => $body,
                        ]
                    ]
                ]
            ]
        ]);

        try {
            $this->messaging->send($message);
        } catch (FirebaseException $e) {
            \Log::error($e->getMessage());
            return false;
        }

        return true;
    }

    /**
     * @param $deviceTokens
     * @param $type
     * @param $title
     * @param $content
     * @param $body
     *
     * @return bool
     * @throws FirebaseException
     * @throws Firebase\Exception\MessagingException
     */
    public static function sendNotification($deviceTokens, $type, $title, $content, $body)
    {

    }
}
