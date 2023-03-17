<?php

namespace App\Repositories;

use App\Models\Product;
use function App\Support\Helpers\fieldsLike;

class ProductRepository
{
    /**
     * @var Product
     */
    private $product;

    /**
     * ProductRepository constructor.
     *
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @param string $search
     * @param array  $productIds
     */
    public static function search(string $search = null, array $productIds = [])
    {
        if (! isset($search) && (! isset($productIds) || 0 === count($productIds))) {
            throw new \InvalidArgumentException('At least one param should be set');
        }

        $products = Product::query()
            ->with('category')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*')
            ->orderBy('shop_id')
            ->orderBy('products.order')
            ->where('categories.is_visible', '=', 1)
            ->where('products.is_visible', '=', 1)
            ->whereHas('shop', function ($query) { $query->where('is_approved', '=', 1); });

        if (isset($search)) {
            $products->where(fieldsLike($search, 'products.name', 'categories.name'));
        }

        if (0 < count($productIds)) {
            $products->whereIn('products.id', $productIds);
        }

        return $products->get();
    }

    /**
     *
     */
    public function makeVisible()
    {
        $this->product->is_visible = true;
        $this->product->save();
    }

    /**
     *
     */
    public function makeInvisible()
    {
        $this->product->is_visible = false;
        $this->product->save();
    }

    /**
     * @param string      $name
     * @param string      $description
     * @param int         $price
     * @param int         $isVisible
     * @param string|null $photo
     */
    public function update($name, $description, $price, $isVisible, $photo)
    {
        $this->product->name = $name;
        $this->product->description = $description;
        $this->product->price = $price;
        $this->product->is_visible = $isVisible;
        $this->product->photo = $photo;

        $this->product->save();
    }
}
