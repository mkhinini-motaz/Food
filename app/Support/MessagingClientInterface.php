<?php

namespace App\Support;

interface MessagingClientInterface
{
    /**
     * pushes a new notification to a server
     *
     * @param $deviceToken
     * @param $type
     * @param $title
     * @param $content
     * @param $body
     *
     * @return mixed
     */
    public function pushNotification($deviceToken, $type, $title, $content, $body);
}
