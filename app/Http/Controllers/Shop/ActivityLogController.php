<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

use App\Models\Shop;
use App\Repositories\ShopRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ActivityLogController extends Controller
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $page           = $request->input('page', null);
        $search         = $request->input('search', null);
        $perPage        = $request->input('perPage', null);
        $orderBy        = $request->input('orderBy', 'created_at');
        $orderDirection = $request->input('orderDirection', 'desc');

        /** @var Shop $shop */
        $shop     = $request->get('shop');
        $shopRepo = new ShopRepository($shop);

        $activityLogs = $shopRepo->paginateActivityLogs($page, $perPage, $search, $orderBy, $orderDirection);

        return response()->json([ 'status' => 'success', 'data' => $activityLogs ], 200);
    }

    /**
     * @param int $activityLogId
     *
     * @return JsonResponse
     */
    public function show($activityLogId)
    {
        $activityLog = ActivityLog::with('causer')->findOrFail($activityLogId);

        return response()->json([ 'status' => 'success','data' => $activityLog ], 200);
    }
}
