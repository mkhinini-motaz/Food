<?php

namespace App\Repositories;

use App\Models\Client;

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
     * @param string      $firstName
     * @param string      $lastName
     * @param string      $email
     * @param string      $password
     * @param string      $phone
     * @param bool        $isPhoneConfirmed
     * @param string|null $latitude
     * @param string|null $longitude
     *
     * @return Client
     */
    public static function create($firstName, $lastName, $email, $password, $phone, $isPhoneConfirmed = false, $latitude = null, $longitude = null)
    {
        $client = new Client();

        $client->email      = $email;
        $client->phone      = $phone;
        $client->password   = bcrypt($password);
        $client->latitude   = $latitude;
        $client->longitude  = $longitude;
        $client->last_name  = $lastName;
        $client->first_name = $firstName;
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
     * @param string|null $latitude
     * @param string|null $longitude
     */
    public function update($firstName = null, $lastName = null, $email = null, $password = null, $phone = null, $latitude = null, $longitude = null)
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
        }
        if (isset($latitude)) {
            $this->client->latitude = $latitude;
        }
        if (isset($longitude)) {
            $this->client->longitude = $longitude;
        }

        $this->client->save();
    }
}
