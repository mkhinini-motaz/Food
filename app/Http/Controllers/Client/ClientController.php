<?php

namespace App\Http\Controllers\Client;

use App\Http\Resources\ResourceCollection;
use App\Models\Client;
use App\Models\Shop;
use App\Repositories\ShopRepository;
use App\Http\Controllers\Controller;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function checkPhone(Request $request)
    {
        $phone = $request->input('phone');

        return response()->json([ 'status' => 'success', 'data' => Client::phoneExists($phone) ], 200);
    }
}
