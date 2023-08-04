<?php

namespace Database\Seeders\TestShop;

use App\Models\Product;
use App\Models\OptionGroup;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class OptionGroupsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $this->create();

        $this->sandwichOptionGroupAttach();
        $this->tacosOptionGroupAttach();
        $this->pizza4ChoicesOptionGroupAttach();
    }

    /**
     *
     */
    public function create()
    {
        $shopId = Shop::where('name', '=', 'Test shop')->first()->id;

        OptionGroup::factory()->create([
            'name' => [
                'fr'   => 'Salade',
                'en'   => 'Salad',
                'tnar' => 'سلايط',
                'tnfr' => 'Slayet',
                'ar'   => 'سلطة',
            ],
            'photo' => 'example/restaurant/optionGroup/salad.jpg',
            'shop_id' => $shopId,
        ]);

        OptionGroup::factory()->create([
            'name' => [
                'fr'   => 'Sauce',
                'en'   => 'Sauce',
                'tnar' => 'سوس',
                'tnfr' => 'Sauce',
                'ar'   => 'صلصة',
            ],
            'photo' => 'example/restaurant/optionGroup/sauce.jpg',
            'shop_id' => $shopId,
        ]);

        OptionGroup::factory()->create([
            'name' => [
                'fr'   => 'Sauce',
                'en'   => 'Sauce',
                'tnar' => 'سوس',
                'tnfr' => 'Sauce',
                'ar'   => 'صلصة',
            ],
            'photo' => 'example/restaurant/optionGroup/sauce.jpg',
            'shop_id' => $shopId,
        ]);

        OptionGroup::factory()->create([
            'name' => [
                'fr'   => 'Viande',
                'en'   => 'Meat',
                'tnfr' => 'Viande',
                'tnar' => 'لحم',
                'ar'   => 'لحم',
            ],
            'photo' => 'example/restaurant/optionGroup/meat.png',
            'shop_id' => $shopId,
        ]);

        OptionGroup::factory()->create([
            'name' => [
                'fr'   => 'Supplément',
                'en'   => 'Supplement',
                'tnar' => 'اضافات',
                'tnfr' => 'Supplément',
                'ar'   => 'اضافات',
            ],
            'photo' => 'example/restaurant/optionGroup/supplement.jpg',
            'shop_id' => $shopId,
        ]);

        OptionGroup::factory()->create([
            'name' => [
                'fr'   => 'Sauce pizza',
                'en'   => 'Pizza Sauce',
                'tnar' => 'سوس بيتزا',
                'tnfr' => 'Sauce pizza',
                'ar'   => 'صلصة البيتزا',
            ],
            'photo' => 'example/restaurant/optionGroup/sauce_pizza.jpg',
            'shop_id' => $shopId,
        ]);

        OptionGroup::factory()->create([
            'name' => [
                'fr'   => 'Supplément pizza',
                'en'   => 'Pizza supplement',
                'tnar' => 'اضافات بيتزا',
                'tnfr' => 'Supplément pizza',
                'ar'   => 'اضافات بيتزا',
            ],
            'photo' => 'example/restaurant/optionGroup/supplement.jpg',
            'shop_id' => $shopId,
        ]);
    }

    /**
     *
     */
    public function sandwichOptionGroupAttach()
    {
        $order = 1;
        /** @var Shop $shop */
        $shop = Shop::where('name', '=', 'Test shop')->first();

        $optionGroupSauce = $shop->optionGroups()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")
            ->first();
        $optionGroupSupplement = $shop->optionGroups()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")
            ->first();
        $optionGroupSalad = $shop->optionGroups()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Salade'")
            ->first();

        $sandwichProducts = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sandwich'");
            })->get();

        foreach ($sandwichProducts as $product) {
            $product->optionGroups()->sync([
                $optionGroupSauce->id      => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 8, 'options_are_quantifiable' => 1, 'options_are_billable' => 1, ],
                $optionGroupSalad->id      => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 4, 'options_are_quantifiable' => 1, ],
                $optionGroupSupplement->id => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 4, 'options_are_billable' => 1, ],
            ]);
        }
    }

    /**
     *
     */
    public function tacosOptionGroupAttach()
    {
        $shop = Shop::where('name', '=', 'Test shop')->first();

        $optionGroupViande = $shop->optionGroups()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Viande'")
            ->first();
        $optionGroupSauce = $shop->optionGroups()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")
            ->orderByDesc('id')
            ->first();
        $optionGroupSupplement = $shop->optionGroups()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")
            ->first();

        $tacosProducts = $shop->products()
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') <> 'Géant'")
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Tacos'");
            })->get();

        foreach ($tacosProducts as $tacosProduct) {
            $order = 1;
            $tacosProduct->optionGroups()->sync([
                $optionGroupSauce->id => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 8, 'options_are_quantifiable' => 1, 'options_are_billable' => 0, ],
                $optionGroupSupplement->id => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 5, 'options_are_billable' => 1, ],
            ]);
        }

        $tacosGeant = $shop->products()
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Géant'")
            ->first();

        $tacosGeant->optionGroups()->sync([
            $optionGroupViande->id => [ 'order' => $order++, 'min_options' => 1, 'max_options' => 2, ],
            $optionGroupSauce->id => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 8, 'options_are_quantifiable' => 1, ],
            $optionGroupSupplement->id => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 5, 'options_are_billable' => 1, ],
        ]);
    }

    /**
     *
     */
    public function pizza4ChoicesOptionGroupAttach()
    {
        $order = 1;
        $shop = Shop::where('name', '=', 'Test shop')->first();

        $optionGroupSaucePizza = $shop->optionGroups()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce pizza'")
            ->first();
        $optionGroupSupplement = $shop->optionGroups()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément pizza'")
            ->first();

        $quatreGoutPizzaProduct = $shop->Products()
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Au choix'")
            ->first();

        $quatreGoutPizzaProduct->optionGroups()->sync([
            $optionGroupSaucePizza->id => [ 'order' => $order++, 'min_options' => 1, 'max_options' => 2 ],
            $optionGroupSupplement->id => [ 'order' => $order++, 'min_options' => 2, 'max_options' => 4, ],
        ]);
    }
}
