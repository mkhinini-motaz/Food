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
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => 'Escalope grillé',
            'photo' => 'example/restaurant/product/escalope_grille.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => 'Escalope citron',
            'photo' => 'example/restaurant/product/escalope_citron.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => 'Escalope sauce champignon',
            'photo' => 'example/restaurant/product/escalope_sauce_champignon.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => 'Cordon bleu',
            'photo' => 'example/restaurant/product/plat_cordon_bleu.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => 'Brochette viande',
            'photo' => 'example/restaurant/product/brochette_viande.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => 'Brochette escalope',
            'photo' => 'example/restaurant/product/brochette_escalope.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => 'Viande grillé',
            'photo' => 'example/restaurant/product/viande_grille.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => 'Grillade mix',
            'photo' => 'example/restaurant/product/grillade_mix.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => 'Beignet crevette',
            'photo' => 'example/restaurant/product/beignet_crevette.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => 'Calamar doré',
            'photo' => 'example/restaurant/product/calamar_dore.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => 'Symfonie fruit de mer',
            'photo' => 'example/restaurant/product/plat_fruit_mer.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
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
            'photo' => 'example/restaurant/product/sandwich_escalope.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => 'Sandwich thon',
            'photo' => 'example/restaurant/product/sandwich_thon.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => 'Sandwich jambon',
            'photo' => 'example/restaurant/product/sandwich_jambon.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => 'Sandwich nugget',
            'photo' => 'example/restaurant/product/sandwich_nugget.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => 'Sandwich brochette',
            'photo' => 'example/restaurant/product/sandwich_brochette.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => 'Sandwich crevete',
            'photo' => 'example/restaurant/product/sandwich_crevette.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
        ]);
    }

    /**
     *
     */
    public function productsForPizza()
    {
        $pizzaSandwichId = Category::where('name', '=', 'Pizza')->first()->id;
    }

    /**
     *
     */
    public function productsForPates()
    {
        $patesId = Category::where('name', '=', 'Pâtes')->first()->id;
    }

    /**
     *
     */
    public function productsForAperetif()
    {
        $aperetifId = Category::where('name', '=', 'Aperetif')->first()->id;

        Product::factory()->create([
            'name' => 'Corn dog',
            'photo' => 'example/restaurant/product/corn_dog.jpg',
            'category_id' => $aperetifId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
        ]);

        // TODO: nuggets
        // TODO: frites
    }

    /**
     *
     */
    public function productsForTestPagination()
    {
        $testPaginationCategoryId = Category::where('name', '=', 'Test pagination category')->first()->id;

        if (env('APP_ENV') === 'local') {
            Product::factory()->count(500)->create([ 'category_id' => $testPaginationCategoryId ]);
        }
    }
}
