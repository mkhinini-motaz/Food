<?php

namespace Database\Seeders\TestShop;

use App\Models\Ingredient;
use App\Models\Product;
use App\Models\Shop;
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
        $tacos = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Tacos'")
            ->first();

        $bread = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pain'")
            ->first();

        $patePizza = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pate pizza'")
            ->first();

        $pepperoni = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pepperoni'")
            ->first();

        $thon = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Thon'")
            ->first();

        $escalope = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Escalope'")
            ->first();

        $chawarma = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Chawarma'")
            ->first();

        $cordonBleu = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Cordon bleu'")
            ->first();

        $escalopePane = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Escalope pané'")
            ->first();

        $viandeHachee = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Viande hachée'")
            ->first();

        $viandeDeBoeuf = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Viande de boeuf'")
            ->first();

        $mozzarella = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Mozzarella'")
            ->first();

        $cheddar = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Cheddar'")
            ->first();

        $baconBoeuf = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Bacon de boeuf'")
            ->first();

        $baconDinde = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Bacon de dinde'")
            ->first();

        $laitue = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Laitue'")
            ->first();

        $tomate = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Tomate'")
            ->first();

        $oignon = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Oignon'")
            ->first();

        $frites = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Frites'")
            ->first();

        $sauceFromagere = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce fromagère'")
            ->first();

        $harissa = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Harissa'")
            ->first();

        $mayonnaise = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Mayonnaise'")
            ->first();

        $ketchup = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Ketchup'")
            ->first();

        $sauceBarbecue = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Barbecue'")
            ->first();

        $sauceAlgerienne = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Algérienne'")
            ->first();

        $sauceALail = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'À l\\'ail'")->first();

        $slataMechwia = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Salade grillé'")
            ->first();

        $pochette = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pochette'")
            ->first();

        $pochetteFrites = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pochette frites'")
            ->first();

        $sacPlastic = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sac plastique'")
            ->first();

        $setDeTable = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Set de table'")
            ->first();

        $barquetteMayo = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Barquette mayo'")
            ->first();

        $mouchoir = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Mouchoir'")
            ->first();

        $packPizza = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pack pizza'")
            ->first();

        $sacPizza = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sac pizza'")
            ->first();

        $zitoun = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Olive'")
            ->first();

        $felfelBarAbid = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Piment'")
            ->first();

        $sauceTomate = Ingredient::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sauce tomate'")
            ->first();

/*************************************************************************************/
        $shop = Shop::where('name', '=', 'Test shop')->first();

        $tacosEscalope = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Tacos'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Escalope'")
            ->first();
        $tacosChawarma = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Tacos'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Chawarma'")
            ->first();
        $tacosCordonBleu = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Tacos'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Cordon bleu'")
            ->first();
        $tacosEscalopePane = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Tacos'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Escalope pané'")
            ->first();
        $tacosViandeHachee = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Tacos'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Viande hachée'")
            ->first();
        $tacosViandeDeBoeuf = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Tacos'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Viande de boeuf'")
            ->first();
        $tacosGhost = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Tacos'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Ghost'")
            ->first();
        $tacosGeant = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Tacos'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Géant'")
            ->first();

        $sandwichThon = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Sandwich'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Thon'")
            ->first();
        $sandwichEscalope = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Sandwich'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Escalope'")
            ->first();
        $sandwichChawarma = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Sandwich'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Chawarma'")
            ->first();
        $sandwichCordonBleu = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Sandwich'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Cordon bleu'")
            ->first();
        $sandwichEscalopePane = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Sandwich'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Escalope pané'")
            ->first();
        $sandwichViandeHachee = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Sandwich'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Viande hachée'")
            ->first();
        $sandwichViandeDeBoeuf = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Sandwich'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Viande de boeuf'")
            ->first();
        $sandwichGhost = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Sandwich'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Ghost'")
            ->first();

        $pizzaMargherita = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Pizza'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Margherita'")
            ->first();
        $pizzaVegetariene = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Pizza'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Végétariene'")
            ->first();
        $pizzaNapolitaine = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Pizza'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Napolitaine'")
            ->first();
        $pizzaPeperoni = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Pizza'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Pepperoni'")
            ->first();
        $pizzaThon = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Pizza'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Thon'")
            ->first();
        $pizzaChawarma = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Pizza'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Chawarma'")
            ->first();
        $pizzaEscalope = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Pizza'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Escalope'")
            ->first();
        $pizza4Fromages = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Pizza'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = '4 Fromages'")
            ->first();
        $pizzaViandeHachee = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Pizza'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Viande hachée'")
            ->first();
        $pizzaGhost = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Pizza'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Ghost'")
            ->first();

        $pizzaGhostSB = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Pizza sauce blanche'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = 'Ghost'")
            ->first();
        $pizza4FromagesSB = $shop->products()
            ->whereHas('category', function($query) {
                $query->whereRaw("JSON_EXTRACT(categories.name, '$.fr') = 'Pizza sauce blanche'");
            })
            ->whereRaw("JSON_EXTRACT(products.name, '$.fr') = '4 Fromages'")
            ->first();

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
