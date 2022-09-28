<?php

namespace App\Repositories;

use App\Models\Client;

use App\Models\PromoCode;
use App\Models\PromoCodeShopItem;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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
     * @param string      $password
     * @param string      $phone
     * @param bool        $isPhoneConfirmed
     * @param string      $email
     *
     * @return Client
     */
    public static function create($firstName, $lastName, $password, $phone, $isPhoneConfirmed = false,  $email = null)
    {
        $client = new Client();

        $client->email       = $email;
        $client->phone       = $phone;
        $client->password    = bcrypt($password);
        $client->last_name   = $lastName;
        $client->first_name  = $firstName;
        $client->invite_code = Client::generateInviteCode();
        $client->is_phone_confirmed = $isPhoneConfirmed;

        $client->save();

        return $client;
    }

    /**
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $email
     * @param string|null $phone
     * @param bool|null   $isPhoneConfirmed
     */
    public function update($firstName = null, $lastName = null, $email = null, $phone = null, $isPhoneConfirmed = false)
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
        if (isset($phone)) {
            $this->client->phone = preg_replace('#\s#', '', $phone);
            $this->client->is_phone_confirmed = $isPhoneConfirmed; // TODO: WTF is this ???
        }

        $this->client->save();
    }

    /**
     * @param int    $page
     * @param int    $perPage
     * @param string $orderBy
     * @param string $orderDirection
     *
     * @return LengthAwarePaginator
     */
    public function paginateLoyaltyActions($page = 1, $perPage = 20, $orderBy = 'created_at', $orderDirection = 'desc')
    {
        return $this->client->loyaltyActions()
            ->orderBy($orderBy, $orderDirection)
            ->paginate($perPage, [ '*' ], 'page', $page);
    }

    /**
     * @param PromoCodeShopItem $promoCodeShopItem
     *
     * @return PromoCode
     */
    public function createPromoCode(PromoCodeShopItem $promoCodeShopItem)
    {
        $promoCode = new PromoCode();

        $promoCode->code             = PromoCode::generateCode();
        $promoCode->expires_at       = strtotime('00:00 +' . PromoCode::DEFAULT_EXPIRE_AFTER_FOR_CLIENT);
        $promoCode->creator_id       = $this->client->id;
        $promoCode->creator_type     = Client::class;
        $promoCode->reduction_amount = $promoCodeShopItem->reduction_amount;

        $promoCode->save();

        LoyaltyActionRepository::createTypePromoCodeBought($this->client, $promoCodeShopItem);
        return $promoCode;
    }

    /**
     * @param string $password
     */
    public function updatePassword($password)
    {
        $this->client->password = bcrypt($password);
        $this->client->save();
    }
}
