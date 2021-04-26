<?php

namespace App\Http\Controllers\Shop;

use App\Http\Resources\Resource;
use App\Http\Resources\ResourceCollection;
use App\Models\Category;
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

        return Resource::jsonResponse($product);
    }

    /**
     * @param int     $productId
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function makeUnVisible($productId, Request $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');
        /** @var Category $product */
        $product = $shop->products()->findOrFail($productId);
        $productRepository = new ProductRepository($product);
        $productRepository->makeUnVisible();

        return Resource::jsonResponse($product);
    }
}
