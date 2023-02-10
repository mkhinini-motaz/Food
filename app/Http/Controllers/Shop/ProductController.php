<?php

namespace App\Http\Controllers\Shop;

use App\Events\ShopMenuUpdated;
use App\Exceptions\UnableToSaveFileException;
use App\Http\Requests\Shop\Product\UpdateRequest;
use App\Http\Resources\Resource;
use App\Http\Resources\ResourceCollection;
use App\Models\ActivityLog;
use App\Models\Shop;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Http\Controllers\Controller;

use App\Repositories\ShopRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function App\Support\Helpers\uploadFile;

class ProductController extends Controller
{
    /**
     * @param int $shopId
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');
        $shopRepository = new ShopRepository($shop);

        $page = $request->input('page', 1);
        $perPage = $request->input('perPage', 20);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderDirection = $request->input('orderDirection', 'desc');
        $search = $request->input('search', null);
        $categoryIds = $request->input('category_ids', []);
        $productIds = $request->input('product_ids', []);

        $products = $shopRepository->paginateProducts($page, $perPage, $search, $orderBy, $orderDirection, $categoryIds, $productIds, true);

        return ResourceCollection::jsonResponse($products);
    }

    /**
     * @param int     $productId
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function show($productId, Request $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');
        /** @var Product $product */
        $product = $shop->products()->findOrFail($productId);

        return Resource::jsonResponse($product);
    }

    /**
     * @param int           $productId
     * @param UpdateRequest $request
     *
     * @return JsonResponse
     */
    public function update($productId, UpdateRequest $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');
        /** @var Product $product */
        $product = $shop->products()->findOrFail($productId);

        $name        = $request->input('name');
        $price       = $request->input('price');
        $isVisible   = $request->input('is_visible');
        $description = $request->input('description');

        $photoFile          = $request->file('photo', null);
        $photoName          = $request->input('photo', null);
        $photo              = null;
        if (isset($photoFile)) {
            $photo = uploadFile($photoFile, 'product');
            if (!$photo) {
                throw new UnableToSaveFileException();
            }
        } else if ($photoName === $product->photo) {
            $photo = $photoName;
        }

        $productRepository = new ProductRepository($product);
        $productRepository->update($name, $description, $price, $isVisible, $photo);

        ShopMenuUpdated::dispatch($shop->id);

        return Resource::jsonResponse($product);
    }

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

        ShopMenuUpdated::dispatch($shop->id);

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

        ShopMenuUpdated::dispatch($shop->id);

        return Resource::jsonResponse($product);
    }
}
