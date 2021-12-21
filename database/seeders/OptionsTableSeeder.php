<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\OptionGroup;

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $this->optionsForRice();
        $this->optionsForSalad();
        $this->optionsForPotatos();
        $this->optionsForSauce();
        $this->optionsForSaucePizza();
        $this->optionsForViande();
        $this->optionsForSauceFromagere();
        $this->optionsForSupplement();
    }

    /**
     *
     */
    public function optionsForRice()
    {
        $optionGroupRice = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Riz'")->first();

        $optionRizJaune = Option::factory()->create([
            'name' => [
                'fr'   => 'Riz jaune',
                'en'   => 'Yellow rice',
                'tnfr' => 'Roz asfar',
                'tnar' => 'روز أصفر',
                'ar'   => 'ارز أصفر',
            ],
            'photo' => 'example/restaurant/option/yellow_rice.jpg',
        ]);

        $optionRizAil = Option::factory()->create([
            'name' => [
                'fr'   => 'Riz à l\'ail',
                'en'   => 'Garlic rice',
                'tnfr' => 'Roz bi thom',
                'tnar' => 'روز بالثوم',
                'ar'   => 'أرز بالثوم',
            ],
            'photo' => 'example/restaurant/option/rice_garlic_persley.jpg',
        ]);

        $optionRizFruitsSec = Option::factory()->create([
            'name' => [
                'fr'   => 'Riz fruits sec',
                'en'   => 'Dry fruits rice',
                'tnfr' => 'Roz fruits sec',
                'tnar' => 'روز فواكه جافة',
                'ar'   => 'أرز فواكه جافة',
            ],
            'photo' => 'example/restaurant/option/rice_kajo.jpg',
        ]);

        $order = 1;
        $optionGroupRice->options()->sync([
            $optionRizJaune->id     => [ 'order' => $order++, 'is_selected_by_default' => 1 ],
            $optionRizAil->id       => [ 'order' => $order++, ],
            $optionRizFruitsSec->id => [ 'order' => $order++, ],
        ]);
    }

    /**
     *
     */
    public function optionsForSaladOld()
    {
        $optionGroupSalad = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Salade'")->first();

        $optionSaladeConcombre = Option::factory()->create([
            'name' => [
                'fr'   => 'Salade concombre',
                'en'   => 'Cucumber salad',
                'tnfr' => 'Slatet fa9ous',
                'tnar' => 'سلاطة فقوس',
                'ar'   => 'سلطة خيار',
            ],
            'photo' => 'example/restaurant/option/salad_concumber.jpg',
        ]);

        $optionSaladeChouxRouge = Option::factory()->create([
            'name' => [
                'fr'   => 'Salade choux rouge',
                'en'   => 'Red cabbage salad',
                'tnfr' => 'Salatet cromb a7mar',
                'tnar' => 'سلاطة كرمب أحمر',
                'ar'   => 'سلطة ملفوف أحمر',
            ],
            'photo' => 'example/restaurant/option/salad_kronb.jpg',
        ]);

/*
        $optionSaSaladeFruitsDeMer = Option::factory()->create([
            'name' => [
                'fr'   => 'Salade fruits de mer',
                'en'   => 'Seafood salad',
                'tnfr' => 'Slatet fruits de mer',
                'tnar' => 'سلاطة غلال البحر',
                'ar'   => 'سلطة غلال البحر',
            ],
            'photo' => 'example/restaurant/option/salade_fruit_de_mer.jpg',
        ]);
*/

        $optionSaladeCarotte = Option::factory()->create([
            'name' => [
                'fr'   => 'Salade carotte',
                'en'   => 'Carrot salad',
                'tnfr' => 'Slatet sfennaria',
                'tnar' => 'سلاطة سفناريا',
                'ar'   => 'سلطة الجزر',
            ],
            'photo' => 'example/restaurant/option/salad_carrot.jpg',
        ]);

        $optionSaladeBetterave = Option::factory()->create([
            'name' => [
                'fr'   => 'Salade betterave',
                'en'   => 'Beet salad',
                'tnfr' => 'Slatet bettrave',
                'tnar' => 'سلطة بتراف',
                'ar'   => 'سلطة البنجر',
            ],
            'photo' => 'example/restaurant/option/salad_beet.jpg',
        ]);

        $order = 1;
        $optionGroupSalad->options()->sync([
            $optionSaladeConcombre     => [ 'order' => $order++ ],
            $optionSaladeChouxRouge    => [ 'order' => $order++ ],
//            $optionSaSaladeFruitsDeMer => [ 'order' => $order++ ],
            $optionSaladeCarotte       => [ 'order' => $order++ ],
            $optionSaladeBetterave     => [ 'order' => $order++ ],
        ]);
    }

    /**
     *
     */
    public function optionsForSalad()
    {
        $optionGroupSalad = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Salade'")->first();

        $optionLaitue = Option::factory()->create([
            'name' => [
                'fr'   => 'Laitue',
                'en'   => 'Cucumber salad',
                'tnfr' => 'Laitue',
                'tnar' => 'خس',
                'ar'   => 'خس',
            ],
            'photo' => 'example/restaurant/option/laitue.jpg',
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
        ]);

        $optionOignonSaute = Option::factory()->create([
            'name' => [
                'fr'   => 'Oignon sauté',
                'en'   => 'Sauteed onion',
                'tnfr' => 'Bsal sauté',
                'tnar' => 'بصل سوتيه',
                'ar'   => 'بصل سوتيه',
            ],
            'photo' => 'example/restaurant/option/onionsaute.jpg',
        ]);

        $optionCarotte = Option::factory()->create([
            'name' => [
                'fr'   => 'Corotte',
                'en'   => 'Corot',
                'tnfr' => 'Sfennaria',
                'tnar' => 'سفنارية',
                'ar'   => 'جزر',
            ],
            'photo' => 'example/restaurant/option/carotte.jpg',
        ]);

        $optionChouxRouge = Option::factory()->create([
            'name' => [
                'fr'   => 'Choux rouge',
                'en'   => 'Red cabbage',
                'tnfr' => 'Cromb a7mar',
                'tnar' => 'كرمب أحمر',
                'ar'   => 'ملفوف أحمر',
            ],
            'photo' => 'example/restaurant/option/chouxrouge.jpg',
        ]);

        $order = 1;
        $optionGroupSalad->options()->sync([
            $optionLaitue->id      => [ 'order' => $order++, 'is_selected_by_default' => 1 ],
            $optionTomate->id      => [ 'order' => $order++, 'is_selected_by_default' => 1 ],
            $optionOignon->id      => [ 'order' => $order++, 'is_selected_by_default' => 1 ],
            $optionOignonSaute->id => [ 'order' => $order++, ],
            $optionCarotte->id     => [ 'order' => $order++, ],
            $optionChouxRouge->id  => [ 'order' => $order++, ],
        ]);
    }

    /**
     *
     */
    public function optionsForPotatos()
    {
        $optionGroupPotatos = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pomme de terre'")->first();

        $optionFrites = Option::factory()->create([
            'name' => [
                'fr'   => 'Frites',
                'en'   => 'French fries',
                'tnfr' => 'Frites',
                'tnar' => 'فريت',
                'ar'   => 'البطاطس المقلية',
            ],
            'photo' => 'example/restaurant/option/frites.jpg',
        ]);
/*
        $optionPotatoes = Option::factory()->create([
            'name' => [
                'fr'   => 'Potatoes',
                'en'   => 'Potatoes',
                'tnfr' => 'Potatoes',
                'tnar' => 'بوتيتوس ',
                'ar'   => 'بطاطس',
            ],
            'photo' => 'example/restaurant/option/potatos.jpg',
        ]);
*/

        $order = 1;
        $optionGroupPotatos->options()->sync([
            $optionFrites->id      => [ 'order' => $order++, 'is_selected_by_default' => 1 ],
//            $optionPotatoes->id      => [ 'order' => $order++, ],
        ]);
    }

    /**
     *
     */
    public function optionsForSauce()
    {
        $optionGroupSauce = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce'")->first();

        $optionHarissa = Option::factory()->create([
            'name' => [
                'fr'   => 'Harissa',
                'en'   => 'Harissa',
                'tnfr' => 'Hrissa',
                'tnar' => 'هريسة',
                'ar'   => 'هريسة',
            ],
            'photo' => 'example/restaurant/option/harissa.jpg',
        ]);

        $optionMayonnaise = Option::factory()->create([
            'name' => [
                'fr'   => 'Mayonnaise',
                'en'   => 'Mayonnaise',
                'tnfr' => 'Mayonnaise',
                'tnar' => 'مايوناز',
                'ar'   => 'مايونيز',
            ],
            'photo' => 'example/restaurant/option/mayonaise.jpg',
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
        ]);

        $optionSauceHoumous = Option::factory()->create([
            'name' => [
                'fr'   => 'Houmous',
                'en'   => 'Houmous',
                'tnfr' => '7oms',
                'tnar' => 'حمص',
                'ar'   => 'حمص',
            ],
            'photo' => 'example/restaurant/option/saucehommos.jpg',
        ]);

        $order = 1;
        $optionGroupSauce->options()->sync([
            $optionHarissa->id         => [ 'order' => $order++, 'is_selected_by_default' => 1, ],
            $optionMayonnaise->id      => [ 'order' => $order++, 'is_selected_by_default' => 1 ],
            $optionSauceAlgerienne->id => [ 'order' => $order++, ],
            $optionKetchup->id         => [ 'order' => $order++, ],
            $optionSauceBarbecue->id   => [ 'order' => $order++, ],
            $optionSauceHoumous->id    => [ 'order' => $order++, 'price' => 200, ],
        ]);
    }

    /**
     *
     */
    public function optionsForSaucePizza()
    {

        $optionGroupSauce = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce pizza'")->first();

        $optionSauceTomate = Option::factory()->create([
            'name' => [
                'fr'   => 'Sauce tomate',
                'en'   => 'Tomato sauce',
                'tnfr' => 'Sauce tomate',
                'tnar' => 'سوس طماطم',
                'ar'   => 'صلصة الطماطم',
            ],
            'photo' => 'example/restaurant/option/sauce_tomate.jpg',
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
    public function optionsForSauceFromagere()
    {
        $optionGroupSauceFromagere = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce fromagère'")->first();

        $optionSauceFromagere = Option::factory()->create([
            'name' => [
                'fr'   => 'Sauce fromagère',
                'en'   => 'Cheese sauce',
                'tnfr' => 'Sauce fromagère',
                'tnar' => 'سوس فرماج',
                'ar'   => 'صلصة الجبنة',
            ],
            'photo' => 'example/restaurant/option/sauce_fromage.png',
        ]);

        $order = 1;
        $optionGroupSauceFromagere->options()->sync([
            $optionSauceFromagere->id => [ 'order' => $order++, 'is_selected_by_default' => 1 ],
        ]);
    }

    /**
     *
     */
    public function optionsForSupplement()
    {
        $optionGroupSupplement = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first();

        $optionBacon = Option::factory()->create([
            'name' => [
                'fr'   => 'Bacon',
                'en'   => 'Bacon',
                'tnfr' => 'Bacon',
                'tnar' => 'بايكون',
                'ar'   => 'بايكون',
            ],
            'photo' => 'example/restaurant/option/bacon.jpg',
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
        ]);

        $optionJambonBoeuf = Option::factory()->create([
            'name' => [
                'fr'   => 'Jambon de boeuf',
                'en'   => 'Beef ham',
                'tnfr' => 'Jambon de boeuf',
                'tnar' => 'جمبون بقري',
                'ar'   => 'جمبون بقر',
            ],
            'photo' => 'example/restaurant/option/jambon_boeuf.jpg',
        ]);

        $optionJambonDinde = Option::factory()->create([
            'name' => [
                'fr'   => 'Jambon de dinde',
                'en'   => 'Turkey ham',
                'tnfr' => 'Jambon dinde',
                'tnar' => 'جمبون دندون',
                'ar'   => 'جمبون الديك الرومي',
            ],
            'photo' => 'example/restaurant/option/jambon_dinde.jpg',
        ]);

        $optionChampignon = Option::factory()->create([
            'name' => [
                'fr'   => 'Champignon',
                'en'   => 'Mushroom',
                'tnfr' => 'Champignon',
                'tnar' => 'فطر',
                'ar'   => 'فطر',
            ],
            'photo' => 'example/restaurant/option/champignon.jpg',
        ]);

        $optionCheddar = Option::factory()->create([
            'name' => [
                'fr'   => 'Cheddar',
                'en'   => 'Cheddar',
                'tnfr' => 'Cheddar',
                'tnar' => 'شيدر',
                'ar'   => 'شيدر',
            ],
            'photo' => 'example/restaurant/option/cheddar.jpg',
        ]);

        $optionRaclette = Option::factory()->create([
            'name' => [
                'fr'   => 'Raclette',
                'en'   => 'Raclette',
                'tnfr' => 'Raclette',
                'tnar' => 'راكليت',
                'ar'   => 'راكليت',
            ],
            'photo' => 'example/restaurant/option/raclette.png',
        ]);

        $optionGruyere = Option::factory()->create([
            'name' => [
                'fr'   => 'Gruyère',
                'en'   => 'Gruyere',
                'tnfr' => 'Gruyère',
                'tnar' => 'غرويير',
                'ar'   => 'غرويير',
            ],
            'photo' => 'example/restaurant/option/gruyere.jpg',
        ]);

        $optionHalloumiGrille = Option::factory()->create([
            'name' => [
                'fr'   => 'Halloumi grillé',
                'en'   => 'Grilled halloumi',
                'tnfr' => 'Halloumi mechwi',
                'tnar' => 'حلومي مشوي',
                'ar'   => 'حلومي مشوي',
            ],
            'photo' => 'example/restaurant/option/halloumi.jpg',
        ]);

        $order = 1;
        $optionGroupSupplement->options()->sync([
            $optionBacon->id          => [ 'order' => $order++, 'price' => 200, ],
            $optionPeperoni->id       => [ 'order' => $order++, 'price' => 200, ],
            $optionJambonBoeuf->id    => [ 'order' => $order++, 'price' => 200, ],
            $optionJambonDinde->id    => [ 'order' => $order++, 'price' => 200, ],
            $optionChampignon->id     => [ 'order' => $order++, 'price' => 200, ],
            $optionCheddar->id        => [ 'order' => $order++, 'price' => 200, ],
            $optionRaclette->id       => [ 'order' => $order++, 'price' => 200, ],
            $optionGruyere->id        => [ 'order' => $order++, 'price' => 200, ],
            $optionHalloumiGrille->id => [ 'order' => $order++, 'price' => 200, ],
        ]);
    }

    /**
     *
     */
    public function optionsForViande()
    {
        $optionGroupViande = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Viande'")->first();

        $optionChawarma = Option::factory()->create([
            'name' => [
                'fr'   => 'Chawarma',
                'en'   => 'Chawarma',
                'tnfr' => 'Chawarma',
                'tnar' => 'شاورما',
                'ar'   => 'شاورما',
            ],
            'photo' => 'example/restaurant/option/chawarma.jpg',
        ]);

        $optionTenders = Option::factory()->create([
            'name' => [
                'fr'   => 'Tenders',
                'en'   => 'Tenders',
                'tnfr' => 'Tenders',
                'tnar' => 'تندر',
                'ar'   => 'تندر',
            ],
            'photo' => 'example/restaurant/option/tender.jpg',
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
        ]);

        $optionNuggets = Option::factory()->create([
            'name' => [
                'fr'   => 'Nuggets',
                'en'   => 'Nuggets',
                'tnfr' => 'Nuggets',
                'tnar' => 'ناجت',
                'ar'   => 'ناجت',
            ],
            'photo' => 'example/restaurant/option/nugget.jpg',
        ]);

        $optionChicken = Option::factory()->create([
            'name' => [
                'fr'   => 'Chicken',
                'en'   => 'Chicken',
                'tnfr' => 'Chicken',
                'tnar' => 'دجاج',
                'ar'   => 'دجاج',
            ],
            'photo' => 'example/restaurant/option/chicken.jpg',
        ]);

        $optionThon = Option::factory()->create([
            'name' => [
                'fr'   => 'Thon',
                'en'   => 'Tuna',
                'tnfr' => 'Thon',
                'tnar' => 'تن',
                'ar'   => 'تن',
            ],
            'photo' => 'example/restaurant/option/thon.jpg',
        ]);

        $optionFruitsDeMer = Option::factory()->create([
            'name' => [
                'fr'   => 'Fruits de mer',
                'en'   => 'Seafood',
                'tnfr' => 'Fruits de mer',
                'tnar' => 'غلال البحر',
                'ar'   => 'غلال البحر',
            ],
            'photo' => 'example/restaurant/option/fruits_de_mer.jpg',
        ]);

        $order = 1;
        $optionGroupViande->options()->sync([
            $optionChawarma->id    => [ 'order' => $order++ ],
            $optionTenders->id     => [ 'order' => $order++ ],
            $optionEscalope->id    => [ 'order' => $order++ ],
            $optionNuggets->id     => [ 'order' => $order++ ],
            $optionChicken->id     => [ 'order' => $order++ ],
            $optionThon->id        => [ 'order' => $order++ ],
            $optionFruitsDeMer->id => [ 'order' => $order++ ],
        ]);
    }

    /**
     *
     */
    public function optionsForPizzaSupplement()
    {
        $optionGroupSupplement = OptionGroup::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Supplément'")->first();

        $optionfromages = Option::factory()->create([
            'name' => [
                'fr'   => '4 fromages',
                'en'   => '4 cheese',
                'tnfr' => '4 fromages',
                'tnar' => '4 فرماج',
                'ar'   => '4 أجبان',
            ],
            'photo' => 'example/restaurant/option/cheese.jpg',
        ]);

        $optionFruitsDeMer = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Fruits de mer'")->first();
        $optionPeperoni = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Peperoni'")->first();
        $optionJambonBoeuf = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Jambon de boeuf'")->first();
        $optionJambonDinde = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Jambon de dinde'")->first();
        $optionChampignon = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Champignon'")->first();
        $optionThon = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Thon'")->first();
        $optionEscalope = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Escalope'")->first();
        $optionChawarma = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Chawarma'")->first();
        $optionChicken = Option::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Chicken'")->first();

        $order = 1;
        $optionGroupSupplement->options()->sync([
            $optionThon->id        => [ 'order' => $order++, 'price' => 2000, ],
            $optionfromages->id    => [ 'order' => $order++, 'price' => 3500, ],
            $optionFruitsDeMer->id => [ 'order' => $order++, 'price' => 4000, ],
            $optionPeperoni->id    => [ 'order' => $order++, 'price' => 2500, ],
            $optionJambonBoeuf->id => [ 'order' => $order++, 'price' => 2500, ],
            $optionJambonDinde->id => [ 'order' => $order++, 'price' => 2000, ],
            $optionChampignon->id  => [ 'order' => $order++, 'price' => 2000, ],
            $optionEscalope->id    => [ 'order' => $order++, 'price' => 2500, ],
            $optionChawarma->id    => [ 'order' => $order++, 'price' => 2500, ],
            $optionChicken->id     => [ 'order' => $order++, 'price' => 2500, ],
        ]);
    }
}
