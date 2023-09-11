<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Resources\ResourceCollection;
use App\Models\Transporter;
use App\Repositories\OrderRepository;
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
    public function index(Request $request)
    {
        $page    = $request->input('page', 1);
        $perPage = $request->input('perPage', 20);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderDirection = $request->input('orderDirection', 'desc');

        $orders = OrderRepository::paginateOrders($page, $perPage, $orderBy, $orderDirection);

        return ResourceCollection::jsonResponse($orders);
    }
}
