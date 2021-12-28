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
//        $this->pizza4ChoicesOptionGroupAttach();
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
                'tnar' => 'سلاطة',
                'tnfr' => 'Slata',
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
                'fr'   => 'Sauce fromagère',
                'en'   => 'Cheese sauce',
                'tnfr' => 'Sauce fromagère',
                'tnar' => 'سوس فرماج',
                'ar'   => 'صلصة الجبنة',
            ],
            'photo' => 'example/restaurant/optionGroup/sauce_fromage.png',
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
        $optionGroupPotatoes = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pomme de terre'")->first();

        $sandwichProducts = Product::where('category_id', '=', 3)->get();

        foreach ($sandwichProducts as $product) {
            $product->optionGroups()->sync([
                $optionGroupSauce->id      => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 3, 'options_are_quantifiable' => 1, 'options_are_billable' => 1, ],
                $optionGroupSalad->id      => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 4, 'options_are_quantifiable' => 1, ],
                $optionGroupPotatoes->id   => [ 'order' => $order++, ],
                $optionGroupSupplement->id => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 4, 'options_are_billable' => 1, ],
            ]);
        }
    }

    /**
     *
     */
    public function tacosOptionGroupAttach()
    {
        $order = 1;
        $optionGroupViande = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Viande'")->first();
        $optionGroupFromagereSauce = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce fromagère'")->first();
        $optionGroupSauce = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")->first();
        $optionGroupSupplement = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first();

        $tacosS = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Small 1 viande'")->first();

        $tacosS->optionGroups()->sync([
            $optionGroupViande->id => [ 'order' => $order++, 'min_options' => 1, 'max_options' => 1, ],
            $optionGroupFromagereSauce->id => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 1, ],
            $optionGroupSauce->id => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 3, 'options_are_quantifiable' => 1, 'options_are_billable' => 1, ],
            $optionGroupSupplement->id => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 4, 'options_are_billable' => 1, ],
        ]);

        $tacosM = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Medium 2 viandes'")->first();

        $order = 1;
        $tacosM->optionGroups()->sync([
            $optionGroupViande->id => [ 'order' => $order++, 'min_options' => 2, 'max_options' => 2, ],
            $optionGroupFromagereSauce->id => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 1, ],
            $optionGroupSauce->id => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 3, 'options_are_quantifiable' => 1, 'options_are_billable' => 1 ],
            $optionGroupSupplement->id => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 4, 'options_are_billable' => 1, ],
        ]);

        $tacosL = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Large 3 viandes'")->first();

        $order = 1;
        $tacosL->optionGroups()->sync([
            $optionGroupViande->id => [ 'order' => $order++, 'min_options' => 3, 'max_options' => 3, ],
            $optionGroupFromagereSauce->id => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 1, ],
            $optionGroupSauce->id => [ 'order' => $order++, 'min_options' => 0, 'max_options' => 3, 'options_are_quantifiable' => 1, 'options_are_billable' => 1, ],
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
        $optionGroupSupplement = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first();

        $quatreGoutPizzaProduct = Product::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pizza au choix'")->first();
        $quatreGoutPizzaProduct->optionGroups()->sync([
            $optionGroupSaucePizza->id => [ 'order' => $order++ ],
            $optionGroupSupplement->id => [ 'order' => $order++, 'min_options' => 2, 'max_options' => 4, ],
        ]);
    }
}
