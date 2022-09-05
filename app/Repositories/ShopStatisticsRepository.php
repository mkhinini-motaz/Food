<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\Option;
use App\Models\OptionGroup;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;

use Illuminate\Database\Query\Builder;
use function App\Support\Helpers\columnInPeriod;
use function App\Support\Helpers\fieldsLike;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use function App\Support\Helpers\firstNameLastNameLike;

class ShopStatisticsRepository
{
    /**
     * @var Shop
     */
    private $shop;

    /**
     * ShopRepository constructor.
     *
     * @param Shop $shop
     */
    public function __construct(Shop $shop)
    {
        $this->shop = $shop;
    }

    /**
     * @param $dateTime
     *
     * @return array
     */
    // TODO: refactor unto multiple functions
    public function ordersReportForDateTime($dateTime)
    {
        return [
            'count'        => $this->countReport($dateTime),
            'options'      => $this->optionsReport($dateTime),
            'products'     => $this->productsReport($dateTime),
            'countType'    => $this->countTypeReport($dateTime),
            'categories'   => $this->categoriesReport($dateTime),
            'countStatus'  => $this->countStatusReport($dateTime),
            'transporters' => $this->transportersReport($dateTime),
        ];
    }

    /**
     * @param $dateTime
     *
     * @return Model|Builder|object|null
     */
    public function countReport($dateTime)
    {
        return $this->ordersReportQuery($dateTime)
            ->whereNotIn('status', Order::CANCELED_STATUSES)
            ->selectRaw('SUM(total_price) AS total_price, COUNT(*) AS count')
            ->first();
    }

    /**
     * @param $dateTime
     *
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function optionsReport($dateTime)
    {
        $countOptions = $this->ordersReportQuery($dateTime)
            ->whereNotIn('status', Order::CANCELED_STATUSES)
            ->join('choices', 'choices.order_id', '=', 'orders.id')
            ->join('choice_option', 'choice_option.choice_id', '=', 'choices.id')
            ->join('options', 'options.id', '=', 'choice_option.option_id')
            ->where('choice_option.price', '>', 0)
            ->groupBy('options.id')
            ->selectRaw('options.id, SUM(choices.product_count) AS count, SUM(price * product_count) AS sum_price')
            ->orderBy('count')
            ->get()
            ->keyBy('id');

        $optionKeys = $countOptions->keys();
        if (0 === $optionKeys->count()) {
            return [];
        }

        $options = $this->shop->options()
            ->whereIn('options.id', $optionKeys)
            ->orderByRaw("FIELD(options.id , " . implode(',', $optionKeys->toArray()) . ") DESC")
            ->get();

        foreach ($options as $option) {
            $option->count = $countOptions->get($option->id)->count;
            $option->sum_price = (int) $countOptions->get($option->id)->sum_price;
        }

        return $options;
    }

    public function productsReport($dateTime)
    {
        $countProduct = $this->ordersReportQuery($dateTime)
            ->whereNotIn('status', Order::CANCELED_STATUSES)
            ->join('choices', 'choices.order_id', '=', 'orders.id')
            ->join('products', 'choices.product_id', '=', 'products.id')
            ->groupBy('products.id')
            ->selectRaw('products.id, SUM(product_count) AS count, SUM(product_price * product_count) AS sum_price')
            ->orderBy('count')
            ->get()
            ->keyBy('id');

        $productKeys = $countProduct->keys();
        if (0 === $productKeys->count()) {
            return [];
        }

        $products =$this->shop->products()
            ->with('category')
            ->whereIn('products.id', $productKeys)
            ->orderByRaw("FIELD(products.id , " . implode(',', $productKeys->toArray()) . ") DESC")
            ->get();

        foreach ($products as $product) {
            $product->count = $countProduct->get($product->id)->count;
            $product->sum_price = (int) $countProduct->get($product->id)->sum_price;
        }

        return $products;
    }

    /**
     * @param $dateTime
     *
     * @return Collection
     */
    public function countTypeReport($dateTime)
    {
        return $this->ordersReportQuery($dateTime)
            ->groupBy('type')
            ->selectRaw('type, SUM(total_price) AS total_price, COUNT(type) AS count')
            ->orderByDesc('count')
            ->get();
    }

    /**
     * @param $dateTime
     *
     * @return array|Collection
     */
    public function categoriesReport($dateTime)
    {
        $countCategory = $this->ordersReportQuery($dateTime)
            ->whereNotIn('status', Order::CANCELED_STATUSES)
            ->join('choices', 'choices.order_id', '=', 'orders.id')
            ->join('products', 'products.id', '=', 'choices.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->groupBy('categories.id')
            ->selectRaw('categories.id, SUM(product_count) AS count, SUM(product_price * product_count) AS sum_price')
            ->orderBy('count')
            ->get()
            ->keyBy('id');

        $categoryKeys = $countCategory->keys();
        if (0 === $categoryKeys->count()) {
            return [];
        }

        $categories = $this->shop->categories()
            ->whereIn('categories.id', $categoryKeys)
            ->orderByRaw("FIELD(categories.id , " . implode(',', $categoryKeys->toArray()) . ") DESC")
            ->get();

        foreach ($categories as $category) {
            $category->count = $countCategory->get($category->id)->count;
            $category->sum_price = (int) $countCategory->get($category->id)->sum_price;
        }

        return $categories;
    }

    /**
     * @param $dateTime
     *
     * @return Collection
     */
    public function countStatusReport($dateTime)
    {
        return $this->ordersReportQuery($dateTime)
            ->groupBy('status')
            ->selectRaw('status, SUM(total_price) AS total_price, COUNT(status) AS count')
            ->orderByDesc('count')
            ->get();
    }

    /**
     * @param $dateTime
     *
     * @return Collection
     */
    public function transportersReport($dateTime)
    {
        $countTransporter = $this->ordersReportQuery($dateTime)
            ->selectRaw('shop_transporter_id AS id, COUNT(shop_transporter_id) AS count')
            ->groupBy('shop_transporter_id')
            ->orderBy('count')
            ->get()
            ->keyBy('id');

        $workingHours = $this->shop->workingHoursForDate($dateTime); // TODO: missing closed day case
        $ordersRelationForTransporters = ['orders' => function ($query) use ($workingHours) {
            $query->where(columnInPeriod($workingHours, 'orders.created_at'));
        }];
        return $this->shop->shopTransporters()
            ->whereIn('id', $countTransporter->keys())
            ->withCount($ordersRelationForTransporters)
            ->withSum($ordersRelationForTransporters, 'total_price')
            ->get();
    }

    /**
     * @param $dateTime
     *
     * @return Builder
     */
    private function ordersReportQuery($dateTime)
    {
        $workingHours = $this->shop->workingHoursForDate($dateTime); // TODO: missing closed day case

        return \DB::table('orders')
            ->join('locations', 'locations.id', '=', 'orders.location_id')
            ->where('locations.shop_id', '=', $this->shop->id)
            ->where(columnInPeriod($workingHours, 'orders.created_at'));
    }
}
