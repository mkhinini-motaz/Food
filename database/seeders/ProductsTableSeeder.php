<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $this->productsForPlats();
        $this->productsForSandwich();
        $this->productsForPizza();
        $this->productsForPates();
        $this->productsForAperetif();
        $this->productsForBoisson();
        $this->productsForTestPagination();
    }

    /**
     *
     */
    public function productsForPlats()
    {
        $categoryPlatsId = Category::where('name', '=', 'Plats')->first()->id;

        Product::factory()->create([
            'name' => 'Escalope pané',
            'photo' => 'example/restaurant/product/escalope_pane.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 9000,
        ]);

        Product::factory()->create([
            'name' => 'Escalope grillé',
            'photo' => 'example/restaurant/product/escalope_grille.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 8500,
        ]);

        Product::factory()->create([
            'name' => 'Escalope citron',
            'photo' => 'example/restaurant/product/escalope_citron.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 11000,
        ]);

        Product::factory()->create([
            'name' => 'Escalope sauce champignon',
            'photo' => 'example/restaurant/product/escalope_sauce_champignon.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 12500,
        ]);

        Product::factory()->create([
            'name' => 'Cordon bleu',
            'photo' => 'example/restaurant/product/plat_cordon_bleu.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 12000,
        ]);

        Product::factory()->create([
            'name' => 'Brochette viande',
            'photo' => 'example/restaurant/product/brochette_viande.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 14000,
        ]);

        Product::factory()->create([
            'name' => 'Brochette escalope',
            'photo' => 'example/restaurant/product/brochette_escalope.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 11500,
        ]);

        Product::factory()->create([
            'name' => 'Viande grillé',
            'photo' => 'example/restaurant/product/viande_grille.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 14000,
        ]);

        Product::factory()->create([
            'name' => 'Grillade mix',
            'photo' => 'example/restaurant/product/grillade_mix.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 18000,
        ]);

        Product::factory()->create([
            'name' => 'Paella',
            'photo' => 'example/restaurant/product/paella.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_FIXED,
            'price' => 16000,
        ]);

        Product::factory()->create([
            'name' => 'Beignet crevette',
            'photo' => 'example/restaurant/product/beignet_crevette.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 17000,
        ]);

        Product::factory()->create([
            'name' => 'Calamar doré',
            'photo' => 'example/restaurant/product/calamar_dore.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 18000,
        ]);

        Product::factory()->create([
            'name' => 'Symfonie fruit de mer',
            'photo' => 'example/restaurant/product/plat_fruit_mer.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 26000,
        ]);
    }

    /**
     *
     */
    public function productsForSandwich()
    {
        $categorySandwichId = Category::where('name', '=', 'Sandwich')->first()->id;

        Product::factory()->create([
            'name' => 'Sandwich escalope',
            'photo' => 'example/restaurant/product/sandwich_escalope.png',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => 'Sandwich thon',
            'photo' => 'example/restaurant/product/sandwich_thon.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 5500,
        ]);

        Product::factory()->create([
            'name' => 'Sandwich jambon',
            'photo' => 'example/restaurant/product/sandwich_jambon.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 5500,
        ]);

        Product::factory()->create([
            'name' => 'Sandwich nugget',
            'photo' => 'example/restaurant/product/sandwich_nugget.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6500,
        ]);

        Product::factory()->create([
            'name' => 'Sandwich brochette',
            'photo' => 'example/restaurant/product/sandwich_brochette.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6500,
        ]);

        Product::factory()->create([
            'name' => 'Sandwich crevete',
            'photo' => 'example/restaurant/product/sandwich_crevette.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 7500,
        ]);
    }

    /**
     *
     */
    public function productsForPizza()
    {
        $pizzaId = Category::where('name', '=', 'Pizza')->first()->id;

        Product::factory()->create([
            'name' => 'Pizza margherita',
            'photo' => 'example/restaurant/product/pizza_margeritha.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'price' => 8000,
        ]);

        Product::factory()->create([
            'name' => 'Pizza thon',
            'photo' => 'example/restaurant/product/pizza_thon.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'price' => 9000,
        ]);

        Product::factory()->create([
            'name' => 'Pizza fruit de mer',
            'photo' => 'example/restaurant/product/pizza_fruit_mer.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'price' => 14500,
        ]);

        Product::factory()->create([
            'name' => 'Pizza chicken',
            'photo' => 'example/restaurant/product/pizza_chicken.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'price' => 12000,
        ]);

        Product::factory()->create([
            'name' => 'Pizza 4 fromages',
            'photo' => 'example/restaurant/product/pizza_4fromage.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'price' => 12000,
        ]);

        Product::factory()->create([
            'name' => 'Pizza pepperoni',
            'photo' => 'example/restaurant/product/pizza_pepperoni.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'price' => 9500,
        ]);

        Product::factory()->create([
            'name' => 'Pizza regina',
            'photo' => 'example/restaurant/product/pizza_regina.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'price' => 10500,
        ]);

        Product::factory()->create([
            'name' => 'Pizza 4 gout',
            'photo' => 'example/restaurant/product/pizza_4gout.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 12000,
        ]);

        Product::factory()->create([
            'name' => 'Pizza indienne',
            'photo' => 'example/restaurant/product/pizza_indienne.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'price' => 12000,
        ]);
    }

    /**
     *
     */
    public function productsForPates()
    {
        $patesId = Category::where('name', '=', 'Pâtes')->first()->id;

        Product::factory()->create([
            'name' => 'Lasagne fruit mer',
            'photo' => 'example/restaurant/product/lasagne_fruit_mer.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'price' => 12500,
        ]);

        Product::factory()->create([
            'name' => 'Lasagne viande hache',
            'photo' => 'example/restaurant/product/lasagne_viande_hache.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'price' => 8500,
        ]);

        Product::factory()->create([
            'name' => 'Tagliatelle fruit de mer',
            'photo' => 'example/restaurant/product/tagliatelle_fruit_mer.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'price' => 14000,
        ]);

        Product::factory()->create([
            'name' => 'Tagliatelles saumon',
            'photo' => 'example/restaurant/product/tagliatelles_saumon.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'price' => 13500,
        ]);

        Product::factory()->create([
            'name' => 'Spaghetti bolognaise',
            'photo' => 'example/restaurant/product/spaghetti_bolognaise.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'price' => 9000,
        ]);

        Product::factory()->create([
            'name' => 'Spaghetti fruit de mer',
            'photo' => 'example/restaurant/product/spaghetti_fruit_mer.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'price' => 13000,
        ]);

        Product::factory()->create([
            'name' => 'Spaghetti fruit de mer sauce blanche',
            'photo' => 'example/restaurant/product/spaghetti_fruit_mer_sauce_blanche.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'price' => 14000,
        ]);

        Product::factory()->create([
            'name' => 'Spaghetti saumon fumée',
            'photo' => 'example/restaurant/product/spaghetti_saumon_fume.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'price' => 13000,
        ]);

        Product::factory()->create([
            'name' => 'Penne saumon',
            'photo' => 'example/restaurant/product/penne_saumon.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'price' => 13000,
        ]);
    }

    /**
     *
     */
    public function productsForAperetif()
    {
        $entreeId = Category::where('name', '=', 'Entrée')->first()->id;

        Product::factory()->create([
            'name' => 'Corn dog',
            'photo' => 'example/restaurant/product/corn_dog.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'price' => 7000,
        ]);

        Product::factory()->create([
            'name' => 'Nuggets',
            'photo' => 'example/restaurant/product/nugget.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => 'Bric',
            'photo' => 'example/restaurant/product/bric_finger.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'price' => 1500,
        ]);

        Product::factory()->create([
            'name' => 'Frites',
            'photo' => 'example/restaurant/product/frites_parsley.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'price' => 1500,
        ]);
    }

    /**
     *
     */
    public function productsForBoisson()
    {
        $boissonId = Category::where('name', '=', 'Boisson')->first()->id;

        Product::factory()->create([
            'name' => 'Safia 50ml',
            'photo' => 'example/restaurant/product/safia.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'price' => 600,
        ]);

        Product::factory()->create([
            'name' => 'Coca',
            'photo' => 'example/restaurant/product/coca.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'price' => 1200,
        ]);

        Product::factory()->create([
            'name' => 'Fanta',
            'photo' => 'example/restaurant/product/fanta.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'price' => 1200,
        ]);

        Product::factory()->create([
            'name' => 'Boga Lime',
            'photo' => 'example/restaurant/product/boga_lim.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'price' => 1200,
        ]);

        Product::factory()->create([
            'name' => 'Boga cidre',
            'photo' => 'example/restaurant/product/boga_cidre.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'price' => 1200,
        ]);

        Product::factory()->create([
            'name' => 'Apla',
            'photo' => 'example/restaurant/product/apla.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'price' => 1200,
        ]);

        Product::factory()->create([
            'name' => 'Orangina',
            'photo' => 'example/restaurant/product/orangina.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'price' => 1500,
        ]);
    }

    /**
     *
     */
    public function productsForTestPagination()
    {
        if (env('APP_ENV') !== 'local') {
            return;
        }

        $testPaginationCategoryId = Category::where('name', '=', 'Test pagination category')->first()->id;
        Product::factory()->count(500)->create([ 'category_id' => $testPaginationCategoryId ]);
    }
}
