<?php

namespace App\Repositories;

use App\Models\Product;

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
    public function makeUnVisible()
    {
        $this->product->is_visible = false;
        $this->product->save();
    }
}
