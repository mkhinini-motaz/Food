<?php

use Illuminate\Database\Seeder;
use App\Product;

class CategoriesTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $description = 'Hallo, ich bin eine Beschreibung ';

        factory(\App\Model\Category::class)->create([
            'name' => 'Eau et Boissons',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'uploads/categorie/boisson.jpg',
        ]);

        factory(\App\Model\Category::class)->create([
            'name' => 'Conserves',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'uploads/categorie/conserves.jpg',
        ]);

        factory(\App\Model\Category::class)->create([
            'name' => 'Pates, riz semoule, chorba',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'uploads/categorie/pates.jpg',
        ]);

        factory(\App\Model\Category::class)->create([
            'name' => 'Boulangerie',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'uploads/categorie/boulangerie.jpg',
        ]);

        factory(\App\Model\Category::class)->create([
            'name' => 'Surgelé',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'uploads/categorie/surgele.jpg',
        ]);

        factory(\App\Model\Category::class)->create([
            'name' => 'Maison',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'uploads/categorie/maison.jpg',
        ]);

        factory(\App\Model\Category::class)->create([
            'name' => 'Hygiéne',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'uploads/categorie/hygiene.jpg',
        ]);

        factory(\App\Model\Category::class)->create([
            'name' => 'Petit déjeuner',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'uploads/categorie/petit dej.jpg',
        ]);

        factory(\App\Model\Category::class)->create([
            'name' => 'Sucrerie et chocolat',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'uploads/categorie/chocolat.jpg',
        ]);

    }
}