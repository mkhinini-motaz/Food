<?php

namespace App\Http\Controllers\Client;

use App\Http\Resources\ResourceCollection;
use App\Models\Client;
use App\Models\Shop;
use App\Repositories\ClientRepository;
use App\Repositories\ShopRepository;
use App\Http\Controllers\Controller;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoyaltyActionController extends Controller
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

        /** @var Client $client */
        $client = auth()->user();
        $clientRepo = new ClientRepository($client);
        $loyaltyActions = $clientRepo->paginateLoyaltyActions($page, $perPage, $orderBy, $orderDirection);

        return ResourceCollection::jsonResponse($loyaltyActions);
    }
}
