<?php

namespace Database\Seeders\TestShop;

use App\Models\Option;
use App\Models\OptionGroup;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $this->optionsForSalad();
        $this->optionsForSauce();
        $this->optionsForViande();
        $this->optionsForSupplement();
        $this->optionsForSaucePizza();
        $this->optionsForPizzaSupplement();
    }

    /**
     *
     */
    public function optionsForSalad()
    {
        $shop = Shop::where('name', '=', 'Test shop')->first();

        $optionGroupSalad = $shop->optionGroups()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Salade'")
            ->first();

        $optionLaitue = Option::factory()->create([
            'name' => [
                'fr'   => 'Laitue',
                'en'   => 'Cucumber salad',
                'tnfr' => 'Laitue',
                'tnar' => 'خس',
                'ar'   => 'خس',
            ],
            'photo' => 'example/restaurant/option/laitue.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionTomate = Option::factory()->create([
            'name' => [
                'fr'   => 'Tomate',
                'en'   => 'Tomato',
                'tnfr' => 'Tmatem',
                'tnar' => 'طماطم',
                'ar'   => 'طماطم',
            ],
            'photo' => 'example/restaurant/option/tomate.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionOignon = Option::factory()->create([
            'name' => [
                'fr'   => 'Oignon',
                'en'   => 'Onion',
                'tnfr' => 'Bsal',
                'tnar' => 'بصل',
                'ar'   => 'بصل',
            ],
            'photo' => 'example/restaurant/option/onion.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionOignonSaute = Option::factory()->create([
            'name' => [
                'fr'   => 'Oignon sauté',
                'en'   => 'Sauteed onion',
                'tnfr' => 'Bsal sauté',
                'tnar' => 'بصل سوتيه',
                'ar'   => 'بصل سوتيه',
            ],
            'photo' => 'example/restaurant/option/onionsaute.jpeg',
            'shop_id' => $shop->id,
        ]);

        $order = 1;
        $optionGroupSalad->options()->sync([
            $optionLaitue->id      => [ 'order' => $order++, 'is_selected_by_default' => 1 ],
            $optionTomate->id      => [ 'order' => $order++, 'is_selected_by_default' => 1 ],
            $optionOignon->id      => [ 'order' => $order++, 'is_selected_by_default' => 1 ],
            $optionOignonSaute->id => [ 'order' => $order++, ],
        ]);
    }

    /**
     *
     */
    public function optionsForSauce()
    {
        $shop = Shop::where('name', '=', 'Test shop')->first();

        $optionSauceFromagere = Option::factory()->create([
            'name' => [
                'fr'   => 'Sauce fromagère',
                'en'   => 'Cheese sauce',
                'tnfr' => 'Sauce fromagère',
                'tnar' => 'سوس فرماج',
                'ar'   => 'صلصة الجبنة',
            ],
            'photo' => 'example/restaurant/option/saucefromage.png',
            'shop_id' => $shop->id,
        ]);

        $optionHarissa = Option::factory()->create([
            'name' => [
                'fr'   => 'Harissa',
                'en'   => 'Harissa',
                'tnfr' => 'Hrissa',
                'tnar' => 'هريسة',
                'ar'   => 'هريسة',
            ],
            'photo' => 'example/restaurant/option/harissa.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionMayonnaise = Option::factory()->create([
            'name' => [
                'fr'   => 'Mayonnaise',
                'en'   => 'Mayonnaise',
                'tnfr' => 'Mayonnaise',
                'tnar' => 'مايوناز',
                'ar'   => 'مايونيز',
            ],
            'photo' => 'example/restaurant/option/mayonaise.png',
            'shop_id' => $shop->id,
        ]);

        $optionKetchup = Option::factory()->create([
            'name' => [
                'fr'   => 'Ketchup',
                'en'   => 'Ketchup',
                'tnfr' => 'Ketchup',
                'tnar' => 'كاتشب',
                'ar'   => 'كاتشب',
            ],
            'photo' => 'example/restaurant/option/ketchup.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionSauceBarbecue = Option::factory()->create([
            'name' => [
                'fr'   => 'Barbecue',
                'en'   => 'Barbecue',
                'tnfr' => 'Barbecue',
                'tnar' => 'باربكيو',
                'ar'   => 'باربكيو',
            ],
            'photo' => 'example/restaurant/option/barbecue_sauce.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionSauceAlgerienne = Option::factory()->create([
            'name' => [
                'fr'   => 'Algérienne',
                'en'   => 'Algerian',
                'tnfr' => 'Algérienne',
                'tnar' => 'ألجريان',
                'ar'   => 'جزائرية',
            ],
            'photo' => 'example/restaurant/option/algerienne.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionSauceALail = Option::factory()->create([
            'name' => [
                'fr'   => 'À l\'ail',
                'en'   => 'Garlic',
                'tnfr' => 'À l\'ail',
                'tnar' => 'ثوم',
                'ar'   => 'ثوم',
            ],
            'photo' => 'example/restaurant/option/sauceail.png',
            'shop_id' => $shop->id,
        ]);

        $optionSlataMechwia = Option::factory()->create([
            'name' => [
                'fr'   => 'Salade grillé',
                'en'   => 'Grilled salad',
                'tnfr' => 'Slata mechwia',
                'tnar' => 'سلاطة مشوية',
                'ar'   => 'سلطة مشوية',
            ],
            'photo' => 'example/restaurant/option/saucehommos.jpg',
            'shop_id' => $shop->id,
        ]);

        $order = 1;

        $optionGroupSauceSandwich = $shop->optionGroups()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")->first();
        $optionGroupSauceSandwich->options()->sync([
            $optionHarissa->id         => [ 'order' => $order++, 'is_selected_by_default' => 1, ],
            $optionSlataMechwia->id    => [ 'order' => $order++, 'is_selected_by_default' => 1, ],
            $optionMayonnaise->id      => [ 'order' => $order++, 'is_selected_by_default' => 1, ],
            $optionKetchup->id         => [ 'order' => $order++, 'is_selected_by_default' => 1, ],
            $optionSauceBarbecue->id   => [ 'order' => $order++, 'is_selected_by_default' => 1, ],
            $optionSauceFromagere->id  => [ 'order' => $order++, 'is_selected_by_default' => 1, ],
            $optionSauceAlgerienne->id => [ 'order' => $order++, 'is_selected_by_default' => 1, ],
            $optionSauceALail->id      => [ 'order' => $order++, 'is_selected_by_default' => 1, ],
        ]);

        $order = 1;
        $shop = Shop::where('name', '=', 'Test shop')->first();

        $optionGroupSauceTacos = $shop->optionGroups()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")->orderByDesc('id')->first();
        $optionGroupSauceTacos->options()->sync([
            $optionSauceFromagere->id  => [ 'order' => $order++, 'is_selected_by_default' => 1, ],
            $optionHarissa->id         => [ 'order' => $order++, 'is_selected_by_default' => 1, ],
            $optionMayonnaise->id      => [ 'order' => $order++, 'is_selected_by_default' => 1, ],
            $optionKetchup->id         => [ 'order' => $order++, 'is_selected_by_default' => 1, ],
            $optionSauceBarbecue->id   => [ 'order' => $order++, 'is_selected_by_default' => 1, ],
            $optionSauceAlgerienne->id => [ 'order' => $order++, 'is_selected_by_default' => 1, ],
            $optionSauceALail->id      => [ 'order' => $order++, 'is_selected_by_default' => 1, ],
            $optionSlataMechwia->id    => [ 'order' => $order++ ],
        ]);

    }

    /**
     *
     */
    public function optionsForSupplement()
    {
        $shop = Shop::where('name', '=', 'Test shop')->first();

        $optionGroupSupplement = $shop->optionGroups()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first();

        $option4Fromages = Option::factory()->create([
            'name' => [
                'fr'   => '4 fromages',
                'en'   => '4 cheese',
                'tnfr' => '4 fromages',
                'tnar' => '4 فرماج',
                'ar'   => '4 أجبان',
            ],
            'photo' => 'example/restaurant/option/4fromages.png',
            'shop_id' => $shop->id,
        ]);

        $optionBacon = Option::factory()->create([
            'name' => [
                'fr'   => 'Bacon de boeuf',
                'en'   => 'Beef bacon',
                'tnfr' => 'Bacon de boeuf',
                'tnar' => 'بايكون بقري',
                'ar'   => 'بايكون بقر',
            ],
            'photo' => 'example/restaurant/option/bacon.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionBaconDinde = Option::factory()->create([
            'name' => [
                'fr'   => 'Bacon de dinde',
                'en'   => 'Turkey bacon',
                'tnfr' => 'Bacon dinde',
                'tnar' => 'بايكون دندون',
                'ar'   => 'بايكون الديك الرومي',
            ],
            'photo' => 'example/restaurant/option/bacondinde.png',
            'shop_id' => $shop->id,
        ]);

        $optionPeperoni = Option::factory()->create([
            'name' => [
                'fr'   => 'Peperoni',
                'en'   => 'Peperoni',
                'tnfr' => 'Peperoni',
                'tnar' => 'بيبروني',
                'ar'   => 'بيبروني',
            ],
            'photo' => 'example/restaurant/option/peperoni.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionCordonBleu = Option::factory()->create([
            'name' => [
                'fr'   => 'Cordon bleu',
                'en'   => 'Cordon bleu',
                'tnfr' => 'Cordon bleu',
                'tnar' => 'كوردون بلو',
                'ar'   => 'كوردون بلو',
            ],
            'photo' => 'example/restaurant/option/cordonbleu.png',
            'shop_id' => $shop->id,
        ]);

        $optionCheddar = Option::factory()->create([
            'name' => [
                'fr'   => 'Cheddar',
                'en'   => 'Cheddar',
                'tnfr' => 'Cheddar',
                'tnar' => 'شيدر',
                'ar'   => 'شيدر',
            ],
            'photo' => 'example/restaurant/option/chedar.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionMozzarella = Option::factory()->create([
            'name' => [
                'fr'   => 'Mozzarella',
                'en'   => 'Mozzarella',
                'tnfr' => 'Mozzarella',
                'tnar' => 'موزاريلا',
                'ar'   => 'موزاريلا',
            ],
            'photo' => 'example/restaurant/option/mozzarella.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionJambon = Option::factory()->create([
            'name' => [
                'fr'   => 'Jambon',
                'en'   => 'Ham',
                'tnfr' => 'Jambon',
                'tnar' => 'جمبون',
                'ar'   => 'جمبون',
            ],
            'photo' => 'example/restaurant/option/jambon_dinde.jpg',
            'shop_id' => $shop->id,
        ]);

        $order = 1;
        $optionGroupSupplement->options()->sync([
            $option4Fromages->id      => [ 'order' => $order++, 'price' => 4000, ],
            $optionBacon->id          => [ 'order' => $order++, 'price' => 4000, ],
            $optionBaconDinde->id     => [ 'order' => $order++, 'price' => 3500, ],
            $optionCordonBleu->id     => [ 'order' => $order++, 'price' => 3500, ],
            $optionCheddar->id        => [ 'order' => $order++, 'price' => 3000, ],
            $optionMozzarella->id     => [ 'order' => $order++, 'price' => 3000, ],
            $optionPeperoni->id       => [ 'order' => $order++, 'price' => 3000, ],
            $optionJambon->id         => [ 'order' => $order++, 'price' => 2000, ],
        ]);
    }

    /**
     *
     */
    public function optionsForViande()
    {
        $shop = Shop::where('name', '=', 'Test shop')->first();

        $optionGroupViande = $shop->optionGroups()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Viande'")->first();

        $optionChawarma = Option::factory()->create([
            'name' => [
                'fr'   => 'Chawarma',
                'en'   => 'Chawarma',
                'tnfr' => 'Chawarma',
                'tnar' => 'شاورما',
                'ar'   => 'شاورما',
            ],
            'photo' => 'example/restaurant/option/chawarma.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionEscalope = Option::factory()->create([
            'name' => [
                'fr'   => 'Escalope',
                'en'   => 'Escalope',
                'tnfr' => 'Escalope',
                'tnar' => 'اسكالوب',
                'ar'   => 'اسكالوب',
            ],
            'photo' => 'example/restaurant/option/escalope_pizza.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionCordonBleu = Option::factory()->create([
            'name' => [
                'fr'   => 'Cordon bleu',
                'en'   => 'Cordon bleu',
                'tnfr' => 'Cordon bleu',
                'tnar' => 'كوردون بلو',
                'ar'   => 'كوردون بلو',
            ],
            'photo' => 'example/restaurant/product/cordonbleu.png',
            'shop_id' => $shop->id,
        ]);

        $optionEscalopePane = Option::factory()->create([
            'name' => [
                'fr'   => 'Escalope pané',
                'en'   => 'Breaded escalope',
                'tnfr' => 'Escalope pané',
                'tnar' => 'اسكالوب باني',
                'ar'   => 'اسكالوب مخبوز',
            ],
            'photo' => 'example/restaurant/option/escalopepane.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionViandeHache = Option::factory()->create([
            'name' => [
                'fr'   => 'Viande hachée',
                'en'   => 'Hashed meat',
                'tnfr' => 'Viande hachée',
                'tnar' => 'لحم مفروم',
                'ar'   => 'لحم مفروم',
            ],
            'photo' => 'example/restaurant/option/viandehache.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionViandeDeBoeuf = Option::factory()->create([
            'name' => [
                'fr'   => 'Viande de boeuf',
                'en'   => 'Beaf meat',
                'tnfr' => 'Viande de boeuf',
                'tnar' => 'لحم بقري',
                'ar'   => 'لحم بقري',
            ],
            'photo' => 'example/restaurant/option/viande.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionGhost = Option::factory()->create([
            'name' => [
                'fr'   => 'Ghost',
                'en'   => 'Ghost',
                'tnfr' => 'Ghost',
                'tnar' => 'جوست',
                'ar'   => 'جوست',
            ],
            'photo' => 'example/restaurant/option/ghost.jpg',
            'shop_id' => $shop->id,
        ]);

        $order = 1;
        $optionGroupViande->options()->sync([
            $optionGhost->id         => [ 'order' => $order++ ],
            $optionViandeDeBoeuf->id => [ 'order' => $order++ ],
            $optionViandeHache->id   => [ 'order' => $order++ ],
            $optionEscalopePane->id  => [ 'order' => $order++ ],
            $optionCordonBleu->id    => [ 'order' => $order++ ],
            $optionEscalope->id      => [ 'order' => $order++ ],
            $optionChawarma->id      => [ 'order' => $order++ ],
        ]);
    }

    /**
     *
     */
    public function optionsForSaucePizza()
    {

        $shop = Shop::where('name', '=', 'Test shop')->first();

        $optionGroupSauce = $shop->optionGroups()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce pizza'")->first();

        $optionSauceTomate = Option::factory()->create([
            'name' => [
                'fr'   => 'Sauce tomate',
                'en'   => 'Tomato sauce',
                'tnfr' => 'Sauce tomate',
                'tnar' => 'سوس طماطم',
                'ar'   => 'صلصة الطماطم',
            ],
            'photo' => 'example/restaurant/option/sauce_tomate.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionSauceBlanche = Option::factory()->create([
            'name' => [
                'fr'   => 'Sauce blanche',
                'en'   => 'White sauce',
                'tnfr' => 'Sauce blanche',
                'tnar' => 'سوس بلانش',
                'ar'   => 'صلصة بيضاء',
            ],
            'photo' => 'example/restaurant/option/sauce_blanche.jpg',
            'shop_id' => $shop->id,
        ]);

        $order = 1;
        $optionGroupSauce->options()->sync([
            $optionSauceTomate->id  => [ 'order' => $order++, 'is_selected_by_default' => 1 ],
            $optionSauceBlanche->id => [ 'order' => $order++, ],
        ]);
    }

    /**
     *
     */
    public function optionsForPizzaSupplement()
    {
        $shop = Shop::where('name', '=', 'Test shop')->first();

        $optionGroupSupplement = $shop->optionGroups()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément pizza'")->first();

        $optionGhost = Option::factory()->create([
            'name' => [
                'fr'   => 'Ghost',
                'en'   => 'Ghost',
                'tnfr' => 'Ghost',
                'tnar' => 'جوست',
                'ar'   => 'جوست',
                ],
            'photo' => 'example/restaurant/product/pizzaghost.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionViandeHachee = Option::factory()->create([
            'name' => [
                'fr'   => 'Viande hachée',
                'en'   => 'Hashed meat',
                'tnfr' => 'Viande hachée',
                'tnar' => 'لحم مفروم',
                'ar'   => 'لحم مفروم',
                ],
            'photo' => 'example/restaurant/product/pizzavh.jpg',
            'shop_id' => $shop->id,
        ]);

        $option4fromages = Option::factory()->create([
            'name' => [
                'fr'   => '4 fromages',
                'en'   => '4 cheese',
                'tnfr' => '4 fromages',
                'tnar' => '4 فرماج',
                'ar'   => '4 أجبان',
                ],
            'photo' => 'example/restaurant/product/pizza_4fromage.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionEscalope = Option::factory()->create([
            'name' => [
                'fr'   => 'Escalope',
                'en'   => 'Escalope',
                'tnfr' => 'Escalope',
                'tnar' => 'اسكالوب',
                'ar'   => 'اسكالوب',
                ],
            'photo' => 'example/restaurant/product/pizzaescalope.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionChawarma = Option::factory()->create([
            'name' => [
                'fr'   => 'Chawarma',
                'en'   => 'Chawarma',
                'tnfr' => 'Chawarma',
                'tnar' => 'شاورما',
                'ar'   => 'شاورما',
                ],
            'photo' => 'example/restaurant/product/pizzachawarma.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionThon = Option::factory()->create([
            'name' => [
                'fr'   => 'Thon',
                'en'   => 'Tuna',
                'tnfr' => 'Thon',
                'tnar' => 'تن',
                'ar'   => 'تن',
            ],
            'photo' => 'example/restaurant/product/pizzathon.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionPepperoni = Option::factory()->create([
            'name' => [
                'fr'   => 'Pepperoni',
                'en'   => 'Pepperoni',
                'tnfr' => 'Pepperoni',
                'tnar' => 'بيبروني',
                'ar'   => 'بيبروني',
                ],
            'photo' => 'example/restaurant/product/pizzapeperoni.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionCapricciosa = Option::factory()->create([
            'name' => [
                'fr'   => 'Capricciosa',
                'en'   => 'Capricciosa',
                'tnfr' => 'Capricciosa',
                'tnar' => 'كبريسيوزا',
                'ar'   => 'كبريسيوزا',
            ],
            'photo' => 'example/restaurant/product/pizzacapriciosa.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionNapolitaine = Option::factory()->create([
            'name' => [
                'fr'   => 'Napolitaine',
                'en'   => 'Napolitan',
                'tnfr' => 'Napolitaine',
                'tnar' => 'نابوليتان',
                'ar'   => 'نابوليتان',
            ],
            'photo' => 'example/restaurant/product/pizza_margeritha.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionVegetariene = Option::factory()->create([
            'name' => [
                'fr'   => 'Végétariéne',
                'en'   => 'Vegetarian',
                'tnfr' => 'Végétariéne',
                'tnar' => 'نباتية',
                'ar'   => 'نباتية',
            ],
            'photo' => 'example/restaurant/product/pizzavege.jpg',
            'shop_id' => $shop->id,
        ]);

        $optionMargherita = Option::factory()->create([
            'name' => [
                'fr'   => 'Margherita',
                'en'   => 'Margherita',
                'tnfr' => 'Margherita',
                'tnar' => 'مارغريتا',
                'ar'   => 'مارغريتا',
            ],
            'photo' => 'example/restaurant/product/pizzamarg.jpg',
            'shop_id' => $shop->id,
        ]);


        $order = 1;
        $optionGroupSupplement->options()->sync([
            $optionGhost->id        => [ 'order' => $order++, ],
            $optionViandeHachee->id => [ 'order' => $order++, ],
            $option4fromages->id    => [ 'order' => $order++, ],
            $optionChawarma->id     => [ 'order' => $order++, ],
            $optionEscalope->id     => [ 'order' => $order++, ],
            $optionThon->id         => [ 'order' => $order++, ],
            $optionPepperoni->id    => [ 'order' => $order++, ],
            $optionCapricciosa->id  => [ 'order' => $order++, ],
            $optionNapolitaine->id  => [ 'order' => $order++, ],
            $optionVegetariene->id  => [ 'order' => $order++, ],
            $optionMargherita->id   => [ 'order' => $order++, ],
        ]);
    }
}
