<?php

namespace App\Http\Controllers\Transporter;

use App\Http\Controllers\Controller;

use App\Http\Resources\OrderResource;
use App\Http\Resources\ResourceCollection;
use App\Models\Order;
use App\Models\Shop;
use App\Models\Transporter;
use App\Repositories\OrderRepository;
use App\Repositories\ShopRepository;
use App\Repositories\TransporterRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function current(Request $request)
    {
        /** @var Transporter $transporter */
        $transporter = auth()->user();
        $transporterRepository = new TransporterRepository($transporter);

        $page    = $request->input('page', 1);
        $perPage = $request->input('perPage', 20);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderDirection = $request->input('orderDirection', 'desc');

        $orders = $transporterRepository->paginateOrders($page, $perPage, $orderBy, $orderDirection);

        return ResourceCollection::jsonResponse($orders);
    }
}
