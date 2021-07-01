<?php

namespace App\Http\Controllers\Shop;

use App\Http\Resources\Resource;
use App\Models\ActivityLog;
use App\Models\Shop;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Http\Controllers\Controller;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @param int     $productId
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function makeVisible($productId, Request $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');
        /** @var Product $product */
        $product = $shop->products()->findOrFail($productId);

        $productRepository = new ProductRepository($product);
        $productRepository->makeVisible();

        activity()->performedOn($product)
            ->causedBy(auth()->user())
            ->log(ActivityLog::DESCRIPTION_PRODUCT_MAKE_VISIBLE);

        return Resource::jsonResponse($product);
    }

    /**
     * @param int     $productId
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function makeInvisible($productId, Request $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');
        /** @var Product $product */
        $product = $shop->products()->findOrFail($productId);

        $productRepository = new ProductRepository($product);
        $productRepository->makeInvisible();

        activity()->performedOn($product)
            ->causedBy(auth()->user())
            ->log(ActivityLog::DESCRIPTION_PRODUCT_MAKE_INVISIBLE);

        return Resource::jsonResponse($product);
    }
}
