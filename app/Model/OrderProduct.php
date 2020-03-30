<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderProduct
 *
 * WARNING: this class was create only to be able to create a factory for the order_product associative table
 *
 * @package App
 */
class OrderProduct extends Model
{
    protected $dateFormat = 'U';

    protected $table = 'order_product';
}
