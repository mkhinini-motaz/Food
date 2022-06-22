<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\OptionGroup;

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
        OptionGroup::factory()->create([
            'name' => [
                'fr'   => 'Salade',
                'en'   => 'Salad',
                'tnar' => 'سلايط',
                'tnfr' => 'Slayet',
                'ar'   => 'سلطة',
            ],
            'photo' => 'example/restaurant/optionGroup/salad.jpg',
            'shop_id' => 1,
        ]);

        OptionGroup::factory()->create([
            'name' => [
                'fr'   => 'Pomme de terre',
                'en'   => 'Potato',
                'tnar' => 'بطاطا',
                'tnfr' => 'Batata',
                'ar'   => 'بطاطس',
            ],
            'photo' => 'example/restaurant/optionGroup/kartoffeln.jpg',
            'shop_id' => 1,
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
            'shop_id' => 1,
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
            'shop_id' => 1,
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
            'shop_id' => 1,
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
            'shop_id' => 1,
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
            'shop_id' => 1,
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
            'shop_id' => 1,
        ]);
    }

    /**
     *
     */
    public function sandwichOptionGroupAttach()
    {
        $order = 1;
        $optionGroupSauce = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")->first();
        $optionGroupSupplement = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first();
        $optionGroupSalad = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Salade'")->first();

        $sandwichProducts = Product::whereHas('category', function($query) {
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
        $optionGroupViande = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Viande'")->first();
        $optionGroupSauce = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")->orderByDesc('id')->first();
        $optionGroupSupplement = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first();

        $tacosProducts = Product::whereRaw("JSON_EXTRACT(name, '$.fr') <> 'Géant'")
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Tacos'");
            })->get();

        foreach ($tacosProducts as $tacosProduct) {
            $order = 1;
            $tacosProduct->optionGroups()->sync([
                $optionGroupSauce->id => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 8, 'options_are_quantifiable' => 1, 'options_are_billable' => 0, ],
                $optionGroupSupplement->id => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 5, 'options_are_billable' => 1, ],
            ]);
        }

        $tacosGeant = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Géant'")->first();

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
        $optionGroupSaucePizza = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce pizza'")->first();
        $optionGroupSupplement = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément pizza'")->first();

        $quatreGoutPizzaProduct = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Au choix'")->first();
        $quatreGoutPizzaProduct->optionGroups()->sync([
//            $optionGroupSaucePizza->id => [ 'order' => $order++, 'min_options' => 1, 'max_options' => 2 ],
            $optionGroupSupplement->id => [ 'order' => $order++, 'min_options' => 2, 'max_options' => 4, ],
        ]);
    }
}
