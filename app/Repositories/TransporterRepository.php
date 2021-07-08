<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Transporter;

use function App\Support\Helpers\fieldsLike;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TransporterRepository
{
    /**
     * @var Transporter
     */
    private $transporter;

    /**
     * TransporterRepository constructor.
     *
     * @param Transporter $transporter
     */
    public function __construct(Transporter $transporter)
    {
        $this->transporter = $transporter;
    }

    /**
     * Paginate products
     *
     * @param int    $page
     * @param int    $perPage
     * @param string $orderBy
     * @param string $orderDirection
     * @param array  $statuses
     *
     * @return LengthAwarePaginator
     */
    public function paginateOrders($page = 1, $perPage = 20, $orderBy = 'created_at', $orderDirection = 'desc', $statuses = [])
    {
        $orders = $this->transporter->orders()
            ->withNeededRelationsForTransporting();

        if (isset($orderBy) && isset($orderDirection)) {
            $orders->orderBy($orderBy, $orderDirection);
        }

        if (is_array($statuses) && count($statuses) > 0) {
            $orders->whereIn('status', $statuses);
        }

        return $orders->paginate($perPage, [ '*' ], 'page', $page);
    }
}
