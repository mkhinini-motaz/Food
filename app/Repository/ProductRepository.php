<?php

namespace App\Repositories;

use App\Model\Product;

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
}