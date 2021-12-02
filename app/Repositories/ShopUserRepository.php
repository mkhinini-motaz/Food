<?php

namespace App\Repositories;

use App\Models\ShopUser;
use App\Models\Location;
use Illuminate\Support\Collection;
use function App\Support\Helpers\bestRoute;

class ShopUserRepository
{
    /**
     * @var ShopUser
     */
    private $shopUser;

    /**
     * ShopUserRepository constructor.
     *
     * @param ShopUser $shopUser
     */
    public function __construct(ShopUser $shopUser)
    {
        $this->shopUser = $shopUser;
    }

    /**
     * @return Collection
     */
    public function assignedOrders()
    {
        $orders = $this->shopUser->activeOrders()
            ->selectRaw('delivery_latitude AS \'0\', delivery_longitude AS \'1\', id, location_id')
            ->get()
            ->toArray();

        if (0 === count($orders)) {
            return collect();
        }

        $locationId = $orders[0]['location_id']; // TODO: improve
        /** @var Location $location */
        $location = $this->shopUser
            ->shop
            ->locations()
            ->findOrFail($locationId);
        $startingPoint = [ $location->latitude, $location->longitude ];

        $sortedOrders    = bestRoute($startingPoint, $orders);
        $sortedOrdersIds = array_map(function ($order) { return $order['id']; }, $sortedOrders);

        $orders = $this->shopUser->activeOrders()
            ->withNeededRelationsForTransporting()
            ->orderByRaw('FIELD(id,' . implode(',', $sortedOrdersIds) . ')')
            ->paginate();

        return $orders;
    }
}
