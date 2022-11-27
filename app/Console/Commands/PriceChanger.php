<?php

namespace App\Console\Commands;

use App\Models\Option;
use App\Models\Product;
use Database\Seeders\PriceChanger\GhostChefPriceChangerV3;
use Illuminate\Console\Command;

class PriceChanger extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'price:change';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Changes the prices of products according to the selected priceChanger in database seeders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach (GhostChefPriceChangerV3::PRODUCT_PRICES as $productId => $price) {
            Product::whereId($productId)
                ->update(compact('price'));
        }

        foreach (GhostChefPriceChangerV3::OPTION_PRICES as $optionId => $price) {
            \DB::table('option_option_group')
                ->where('option_id', '=', $optionId)
                ->update(compact('price'));
        }
    }
}
