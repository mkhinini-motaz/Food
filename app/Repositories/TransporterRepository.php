<?php

namespace App\Repositories;

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
     *
     * @return LengthAwarePaginator
     */
    public function paginateOrders($page = 1, $perPage = 20, $orderBy = 'created_at', $orderDirection = 'desc')
    {
        $orders = $this->transporter->orders()
            ->withNeededRelationsForTransporting();

        if (isset($orderBy) && isset($orderDirection)) {
            $orders->orderBy($orderBy, $orderDirection);
        }

        return $orders->paginate($perPage, [ '*' ], 'page', $page);
    }
}
