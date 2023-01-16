<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tacos = Ingredient::factory()->create([
            'name'      => [
                'fr'   => 'Tacos',
                'en'   => 'Pate tacos',
                'tnfr' => 'Tacos',
                'tnar' => 'تاكوس',
                'ar'   => 'تاكوس',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_PIECE,
        ]);

        $bread = Ingredient::factory()->create([
            'name'      => [
                'fr'   => 'Pain',
                'en'   => 'Bread',
                'tnfr' => '5obz',
                'tnar' => 'خبز',
                'ar'   => 'خبز',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_PIECE,
        ]);

        $patePizza = Ingredient::factory()->create([
            'name'      => [
                'fr'   => 'Pate pizza',
                'en'   => 'Pizza dough',
                'tnfr' => 'Pate pizza',
                'tnar' => 'عجينة البيتزا',
                'ar'   => 'عجينة البيتزا',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_PIECE,
        ]);

        $pepperoni = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Pepperoni',
                'en'   => 'Pepperoni',
                'tnfr' => 'Pepperoni',
                'tnar' => 'بيبروني',
                'ar'   => 'بيبروني',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $thon = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Thon',
                'en'   => 'Tuna',
                'tnfr' => 'Thon',
                'tnar' => 'تن',
                'ar'   => 'تن',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $escalope = Ingredient::factory()->create([
            'name'      => [
                'fr'   => 'Escalope',
                'en'   => 'Escalope',
                'tnfr' => 'Escalope',
                'tnar' => 'اسكالوب',
                'ar'   => 'اسكالوب',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $chawarma = Ingredient::factory()->create([
            'name'      => [
                'fr'   => 'Chawarma',
                'en'   => 'Chawarma',
                'tnfr' => 'Chawarma',
                'tnar' => 'شاورما',
                'ar'   => 'شاورما',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $cordonBleu = Ingredient::factory()->create([
            'name'      => [
                'fr'   => 'Cordon bleu',
                'en'   => 'Cordon bleu',
                'tnfr' => 'Cordon bleu',
                'tnar' => 'كوردون بلو',
                'ar'   => 'كوردون بلو',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $escalopePane = Ingredient::factory()->create([
            'name'      => [
                'fr'   => 'Escalope pané',
                'en'   => 'Breaded escalope',
                'tnfr' => 'Escalope pané',
                'tnar' => 'اسكالوب باني',
                'ar'   => 'اسكالوب مخبوز',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $viandeHachee = Ingredient::factory()->create([
            'name'      => [
                'fr'   => 'Viande hachée',
                'en'   => 'Hashed meat',
                'tnfr' => 'Viande hachée',
                'tnar' => 'لحم مفروم',
                'ar'   => 'لحم مفروم',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $viandeDeBoeuf = Ingredient::factory()->create([
            'name'      => [
                'fr'   => 'Viande de boeuf',
                'en'   => 'Beaf meat',
                'tnfr' => 'Viande de boeuf',
                'tnar' => 'لحم بقري',
                'ar'   => 'لحم بقري',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $mozzarella = Ingredient::factory()->create([
            'name'      => [
                'fr'   => 'Mozzarella',
                'en'   => 'Mozzarella',
                'tnfr' => 'Mozzarella',
                'tnar' => 'موزاريلا',
                'ar'   => 'موزاريلا',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $cheddar = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Cheddar',
                'en'   => 'Cheddar',
                'tnfr' => 'Cheddar',
                'tnar' => 'شيدر',
                'ar'   => 'شيدر',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $baconBoeuf = Ingredient::factory()->create([
            'name'      => [
                'fr'   => 'Bacon de boeuf',
                'en'   => 'Beef bacon',
                'tnfr' => 'Bacon de boeuf',
                'tnar' => 'بايكون بقري',
                'ar'   => 'بايكون بقر',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $baconDinde = Ingredient::factory()->create([
            'name'      => [
                'fr'   => 'Bacon de dinde',
                'en'   => 'Turkey bacon',
                'tnfr' => 'Bacon dinde',
                'tnar' => 'بايكون دندون',
                'ar'   => 'بايكون الديك الرومي',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $laitue = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Laitue',
                'en'   => 'Cucumber salad',
                'tnfr' => 'Laitue',
                'tnar' => 'خس',
                'ar'   => 'خس',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $tomate = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Tomate',
                'en'   => 'Tomato',
                'tnfr' => 'Tmatem',
                'tnar' => 'طماطم',
                'ar'   => 'طماطم',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $oignon = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Oignon',
                'en'   => 'Onion',
                'tnfr' => 'Bsal',
                'tnar' => 'بصل',
                'ar'   => 'بصل',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $frites = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Frites',
                'en'   => 'French fries',
                'tnfr' => 'Frites',
                'tnar' => 'فريت',
                'ar'   => 'البطاطس المقلية',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $sauceFromagere = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Sauce fromagère',
                'en'   => 'Cheese sauce',
                'tnfr' => 'Sauce fromagère',
                'tnar' => 'سوس فرماج',
                'ar'   => 'صلصة الجبنة',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_MILLILITER,
        ]);

        $harissa = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Harissa',
                'en'   => 'Harissa',
                'tnfr' => 'Hrissa',
                'tnar' => 'هريسة',
                'ar'   => 'هريسة',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $mayonnaise = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Mayonnaise',
                'en'   => 'Mayonnaise',
                'tnfr' => 'Mayonnaise',
                'tnar' => 'مايوناز',
                'ar'   => 'مايونيز',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_MILLILITER,
        ]);

        $ketchup = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Ketchup',
                'en'   => 'Ketchup',
                'tnfr' => 'Ketchup',
                'tnar' => 'كاتشب',
                'ar'   => 'كاتشب',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_MILLILITER,
        ]);

        $sauceBarbecue = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Barbecue',
                'en'   => 'Barbecue',
                'tnfr' => 'Barbecue',
                'tnar' => 'باربكيو',
                'ar'   => 'باربكيو',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_MILLILITER,
        ]);

        $sauceAlgerienne = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Algérienne',
                'en'   => 'Algerian',
                'tnfr' => 'Algérienne',
                'tnar' => 'ألجريان',
                'ar'   => 'جزائرية',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_MILLILITER,
        ]);

        $sauceALail = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'À l\'ail',
                'en'   => 'Garlic',
                'tnfr' => 'À l\'ail',
                'tnar' => 'ثوم',
                'ar'   => 'ثوم',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_MILLILITER,
        ]);

        $slataMechwia = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Salade grillé',
                'en'   => 'Grilled salad',
                'tnfr' => 'Slata mechwia',
                'tnar' => 'سلاطة مشوية',
                'ar'   => 'سلطة مشوية',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $pochette = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Pochette',
                'en'   => 'Paper bag',
                'tnfr' => 'Pochette',
                'tnar' => 'بوشات',
                'ar'   => 'كيس ورقي',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_PIECE,
        ]);

        $pochetteFrites = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Pochette frites',
                'en'   => 'Fries bag',
                'tnfr' => 'Pochette frit',
                'tnar' => 'بوشات فريت',
                'ar'   => 'كيس فريت',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_PIECE,
        ]);

        $sacPlastic = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Sac plastique',
                'en'   => 'Plastic bag',
                'tnfr' => 'Sac plastic',
                'tnar' => 'ساك بلاستيك',
                'ar'   => 'كيس بلاستيك',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_PIECE,
        ]);

        $setDeTable = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Set de table',
                'en'   => 'Table set',
                'tnfr' => 'Set de table',
                'tnar' => 'ورق',
                'ar'   => 'ورق',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_PIECE,
        ]);

        $barquetteMayo = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Barquette mayo',
                'en'   => 'Mayonaise tray',
                'tnfr' => 'Barquette mayo',
                'tnar' => 'بركات مايو',
                'ar'   => 'صينية المايونيز',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_PIECE,
        ]);

        $mouchoir = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Mouchoir',
                'en'   => 'Tissue',
                'tnfr' => 'Mouchoir',
                'tnar' => 'مشوار',
                'ar'   => 'مناديل ورقية',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_PIECE,
        ]);

        $packPizza = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Pack pizza',
                'en'   => 'Pizza pack',
                'tnfr' => 'Bakou pizza',
                'tnar' => 'باكو بيتزا',
                'ar'   => 'علبة بيتزا',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_PIECE,
        ]);

        $sacPizza = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Sac pizza',
                'en'   => 'Pizza bag',
                'tnfr' => 'Sac pizza',
                'tnar' => 'ساك بيتزا',
                'ar'   => 'كيس بيتزا',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_PIECE,
        ]);

        $zitoun = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Olive',
                'en'   => 'Olive',
                'tnfr' => 'Zitoun',
                'tnar' => 'زيتون',
                'ar'   => 'زيتون',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $felfelBarAbid = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Piment',
                'en'   => 'Peper',
                'tnfr' => 'Felfel Bar abid',
                'tnar' => 'فلفل بر عبيد',
                'ar'   => 'فلفل بر عبيد',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);

        $sauceTomate = Ingredient::factory()->create([
            'name' => [
                'fr'   => 'Sauce tomate',
                'en'   => 'Tomato sauce',
                'tnfr' => 'Sauce tomate',
                'tnar' => 'سوس طماطم',
                'ar'   => 'صلصة الطماطم',
            ],
            'dose_unit' => Ingredient::DOSE_UNIT_GRAM,
        ]);


/************************************************************************************************/

        $tacosEscalope = Product::where('category_id', 1)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Escalope'")->first();
        $tacosChawarma = Product::where('category_id', 1)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Chawarma'")->first();
        $tacosCordonBleu = Product::where('category_id', 1)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Cordon bleu'")->first();
        $tacosEscalopePane = Product::where('category_id', 1)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Escalope pané'")->first();
        $tacosViandeHachee = Product::where('category_id', 1)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Viande hachée'")->first();
        $tacosViandeDeBoeuf = Product::where('category_id', 1)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Viande de boeuf'")->first();
        $tacosGhost = Product::where('category_id', 1)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Ghost'")->first();
        $tacosGeant = Product::where('category_id', 1)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Géant'")->first();

        $sandwichThon = Product::where('category_id', 2)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Thon'")->first();
        $sandwichEscalope = Product::where('category_id', 2)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Escalope'")->first();
        $sandwichChawarma = Product::where('category_id', 2)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Chawarma'")->first();
        $sandwichCordonBleu = Product::where('category_id', 2)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Cordon bleu'")->first();
        $sandwichEscalopePane = Product::where('category_id', 2)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Escalope pané'")->first();
        $sandwichViandeHachee = Product::where('category_id', 2)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Viande hachée'")->first();
        $sandwichViandeDeBoeuf = Product::where('category_id', 2)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Viande de boeuf'")->first();
        $sandwichGhost = Product::where('category_id', 2)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Ghost'")->first();

        $pizzaMargherita = Product::where('category_id', 3)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Margherita'")->first();
        $pizzaVegetariene = Product::where('category_id', 3)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Végétariene'")->first();
        $pizzaNapolitaine = Product::where('category_id', 3)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Napolitaine'")->first();
        $pizzaPeperoni = Product::where('category_id', 3)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pepperoni'")->first();
        $pizzaThon = Product::where('category_id', 3)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Thon'")->first();
        $pizzaChawarma = Product::where('category_id', 3)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Chawarma'")->first();
        $pizzaEscalope = Product::where('category_id', 3)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Escalope'")->first();
        $pizza4Fromages = Product::where('category_id', 3)->whereRaw("JSON_EXTRACT(name, '$.fr') = '4 Fromages'")->first();
        $pizzaViandeHachee = Product::where('category_id', 3)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Viande hachée'")->first();
        $pizzaGhost = Product::where('category_id', 3)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Ghost'")->first();

        $pizzaGhostSB = Product::where('category_id', 4)->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Ghost'")->first();
        $pizza4FromagesSB = Product::where('category_id', 4)->whereRaw("JSON_EXTRACT(name, '$.fr') = '4 Fromages'")->first();

/************************************************************************************************/

        $tacosIngredients = [
            $tacos->id => [ 'dose' => 1 ],
            $frites->id => [ 'dose' => 200 ],

            $harissa->id => [ 'dose' => 30 ],
            $sauceFromagere->id => [ 'dose' => 70 ],
            $mayonnaise->id => [ 'dose' => 40 ],
            $ketchup->id => [ 'dose' => 40 ],
            $sauceBarbecue->id => [ 'dose' => 40 ],
            $sauceAlgerienne->id => [ 'dose' => 40 ],
            $sauceALail->id => [ 'dose' => 40 ],

            $pochette->id => [ 'dose' => 1 ],
            $setDeTable->id => [ 'dose' => 1 ],
            $pochetteFrites->id => [ 'dose' => 1 ],
            $sacPlastic->id => [ 'dose' => 1 ],
            $barquetteMayo->id => [ 'dose' => 2 ],
            $mouchoir->id => [ 'dose' => 1 ],
        ];

        $sandwichIngredients = [
            $bread->id => [ 'dose' => 1 ],
            $frites->id => [ 'dose' => 100 ],

            $laitue->id => [ 'dose' => 40 ],
            $tomate->id => [ 'dose' => 40 ],
            $oignon->id => [ 'dose' => 40 ],

            $harissa->id => [ 'dose' => 30 ],
            $slataMechwia->id => [ 'dose' => 30 ],
            $sauceFromagere->id => [ 'dose' => 30 ],
            $mayonnaise->id => [ 'dose' => 40 ],
            $ketchup->id => [ 'dose' => 40 ],
            $sauceBarbecue->id => [ 'dose' => 40 ],
            $sauceAlgerienne->id => [ 'dose' => 40 ],

            $pochette->id => [ 'dose' => 1 ],
            $pochetteFrites->id => [ 'dose' => 1 ],
            $sacPlastic->id => [ 'dose' => 1 ],
            $barquetteMayo->id => [ 'dose' => 2 ],
        ];
        $pizzaIngredients = [
            $patePizza->id => [ 'dose' => 1 ],
            $mozzarella->id => [ 'dose' => 90 ],
            $sauceTomate->id => [ 'dose' => 100 ],

            $zitoun->id => [ 'dose' => 30 ],
            $felfelBarAbid->id => [ 'dose' => 30 ],

            $packPizza->id => [ 'dose' => 1 ],
            $sacPizza->id => [ 'dose' => 1 ],
        ];
        $pizzaSBIngredients = [
            $patePizza->id => [ 'dose' => 1 ],
            $mozzarella->id => [ 'dose' => 90 ],
            $sauceFromagere->id => [ 'dose' => 100 ],

            $zitoun->id => [ 'dose' => 30 ],
            $felfelBarAbid->id => [ 'dose' => 30 ],

            $packPizza->id => [ 'dose' => 1 ],
            $sacPizza->id => [ 'dose' => 1 ],
        ];

/************************************************************************************************/

        $tacosEscalope->ingredients()->sync($tacosIngredients + [ $escalope->id => [ 'dose' => 120 ] ]);
        $tacosChawarma->ingredients()->sync($tacosIngredients + [ $chawarma->id => [ 'dose' => 120 ] ]);
        $tacosCordonBleu->ingredients()->sync($tacosIngredients + [ $cordonBleu->id => [ 'dose' => 95 ] ]);
        $tacosEscalopePane->ingredients()->sync($tacosIngredients + [ $escalopePane->id => [ 'dose' => 120 ] ]);
        $tacosViandeHachee->ingredients()->sync($tacosIngredients + [ $viandeHachee->id => [ 'dose' => 120 ] ]);
        $tacosViandeDeBoeuf->ingredients()->sync($tacosIngredients + [ $viandeDeBoeuf->id => [ 'dose' => 120 ] ]);
        $tacosGhost->ingredients()->sync($tacosIngredients + [ $baconBoeuf->id => [ 'dose' => 40 ], $baconDinde->id => [ 'dose' => 40 ], $mozzarella->id => [ 'dose' => 40 ], ]);
        $tacosGeant->ingredients()->sync($tacosIngredients + [ $tacos->id => [ 'dose' => 2 ] ]);

        $sandwichThon->ingredients()->sync($sandwichIngredients + [ $thon->id => [ 'dose' => 120 ], ]);
        $sandwichEscalope->ingredients()->sync($sandwichIngredients + [ $escalope->id => [ 'dose' => 120 ], ]);
        $sandwichChawarma->ingredients()->sync($sandwichIngredients + [ $chawarma->id => [ 'dose' => 120 ] ]);
        $sandwichCordonBleu->ingredients()->sync($sandwichIngredients + [ $cordonBleu->id => [ 'dose' => 95 ] ]);
        $sandwichEscalopePane->ingredients()->sync($sandwichIngredients + [ $escalopePane->id => [ 'dose' => 120 ] ]);
        $sandwichViandeHachee->ingredients()->sync($sandwichIngredients + [ $viandeHachee->id => [ 'dose' => 120 ] ]);
        $sandwichViandeDeBoeuf->ingredients()->sync($sandwichIngredients + [ $viandeDeBoeuf->id => [ 'dose' => 120 ] ]);
        $sandwichGhost->ingredients()->sync($sandwichIngredients + [ $baconBoeuf->id => [ 'dose' => 40 ], $baconDinde->id => [ 'dose' => 40 ], $mozzarella->id => [ 'dose' => 40 ], ]);

        $pizzaMargherita->ingredients()->sync($pizzaIngredients + [ ]);
        $pizzaVegetariene->ingredients()->sync($pizzaIngredients + [ ]);
        $pizzaNapolitaine->ingredients()->sync($pizzaIngredients + [ $mozzarella->id => [ 'dose' => 130 ], ]);
        $pizzaPeperoni->ingredients()->sync($pizzaIngredients + [ $pepperoni->id => [ 'dose' => 50 ], ]);
        $pizzaThon->ingredients()->sync($pizzaIngredients + [ $thon->id => [ 'dose' => 70 ], ]);
        $pizzaEscalope->ingredients()->sync($pizzaIngredients + [ $escalope->id => [ 'dose' => 90 ], ]);
        $pizzaChawarma->ingredients()->sync($pizzaIngredients + [ $chawarma->id => [ 'dose' => 90 ], ]);
        $pizza4Fromages->ingredients()->sync($pizzaIngredients + [ $mozzarella->id => [ 'dose' => 130 ], $cheddar->id => [ 'dose' => 40 ] ]);
        $pizzaViandeHachee->ingredients()->sync($pizzaIngredients + [ $viandeHachee->id => [ 'dose' => 90 ], ]);
        $pizzaGhost->ingredients()->sync($pizzaIngredients + [ $baconBoeuf->id => [ 'dose' => 40 ], $baconDinde->id => [ 'dose' => 40 ], ]);

        $pizza4FromagesSB->ingredients()->sync($pizzaSBIngredients + [ $mozzarella->id => [ 'dose' => 130 ], $cheddar->id => [ 'dose' => 40 ] ]);
        $pizzaGhostSB->ingredients()->sync($pizzaSBIngredients + [ $baconBoeuf->id => [ 'dose' => 40 ], $baconDinde->id => [ 'dose' => 40 ], ]);
    }
}
