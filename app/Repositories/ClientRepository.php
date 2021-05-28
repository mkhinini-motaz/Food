<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\Shop;

use Illuminate\Support\Str;

class ClientRepository
{
    /**
     * @var Client
     */
    private $client;

    /**
     * ClientRepository constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param Shop        $shop
     * @param string      $firstName
     * @param string      $lastName
     * @param string      $password
     * @param string      $phone
     * @param bool        $isPhoneConfirmed
     * @param string      $email
     *
     * @return Client
     */
    public static function create(Shop $shop, $firstName, $lastName, $password, $phone, $isPhoneConfirmed = false,  $email = null)
    {
        $client = new Client();

        $client->shop_id     = $shop->id;
        $client->email       = $email;
        $client->phone       = $phone;
        $client->password    = bcrypt($password);
        $client->last_name   = $lastName;
        $client->first_name  = $firstName;
        $client->invite_code = self::generateInviteCode($shop);
        $client->is_phone_confirmed = $isPhoneConfirmed;

        $client->save();
        return $client;
    }

    /**
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $email
     * @param string|null $password
     * @param string|null $phone
     * @param bool|null   $isPhoneConfirmed
     */
    public function update($firstName = null, $lastName = null, $email = null, $password = null, $phone = null, $isPhoneConfirmed = false)
    {
// TODO: handle nullable fields

        if (isset($firstName)) {
            $this->client->first_name = $firstName;
        }
        if (isset($lastName)) {
            $this->client->last_name = $lastName;
        }
        if (isset($email)) {
            $this->client->email = $email;
        }
        if (isset($password)) {
            $this->client->password = bcrypt($password);
        }
        if (isset($phone)) {
            $this->client->phone = preg_replace('#\s#', '', $phone);
            $this->client->is_phone_confirmed = $isPhoneConfirmed;
        }

        $this->client->save();
    }

    /**
     * @param Shop $shop
     *
     * @return string
     */
    public static function generateInviteCode(Shop $shop)
    {
        do {
            $inviteCode = Str::random(Client::INVITE_CODE_LENGTH);
            $inviteCodeExists = 1 <= $shop->clients()
                    ->where('invite_code', '=', $inviteCode)
                    ->count();
        } while ($inviteCodeExists);

        return $inviteCode;
    }
}
