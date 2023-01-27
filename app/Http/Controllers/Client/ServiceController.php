<?php

namespace App\Http\Controllers\Client;

use App\Http\Resources\ResourceCollection;
use App\Models\Service;
use App\Http\Controllers\Controller;

use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        $services = Service::query()->get();

        return ResourceCollection::jsonResponse($services);
    }
}
