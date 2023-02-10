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
