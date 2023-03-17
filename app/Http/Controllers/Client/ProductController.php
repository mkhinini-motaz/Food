<?php

namespace App\Http\Controllers\Client;

use App\Http\Resources\ResourceCollection;
use App\Http\Controllers\Controller;

use App\Repositories\ProductRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function search(Request $request)
    {

        $request->validate([
            'search' => 'required_without:product_ids',
            'product_ids' => 'required_without:search',
        ]);

        $search     = $request->input('search', null);
        $productIds = $request->input('product_ids', []);

        $products = ProductRepository::search($search, $productIds);

        return ResourceCollection::jsonResponse($products);
    }
}
