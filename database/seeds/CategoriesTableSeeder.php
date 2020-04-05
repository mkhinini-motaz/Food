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
        $description = 'Hallo, ich bin eine Beschreibung, ich bin hier, weil es nichts anderes gibt, um die Lücke meines Platzes zu füllen';

        factory(\App\Model\Category::class)->create([
            'name' => 'Eau et Boissons',
            'description' => $description,
            'photo' => 'uploads/categorie/boissons.jpg',
        ]);

        factory(\App\Model\Category::class)->create([
            'name' => 'Conserves',
            'description' => $description,
            'photo' => 'uploads/categorie/conserves.jpg',
        ]);

        factory(\App\Model\Category::class)->create([
            'name' => 'Pates, riz semoule, chorba',
            'description' => $description,
            'photo' => 'uploads/categorie/pates.jpg',
        ]);

        factory(\App\Model\Category::class)->create([
            'name' => 'Boulangerie',
            'description' => $description,
            'photo' => 'uploads/categorie/boulangerie.jpg',
        ]);

        factory(\App\Model\Category::class)->create([
            'name' => 'Surgelé',
            'description' => $description,
            'photo' => 'uploads/categorie/surgele.jpg',
        ]);

        factory(\App\Model\Category::class)->create([
            'name' => 'Maison',
            'description' => $description,
            'photo' => 'uploads/categorie/maison.jpg',
        ]);

        factory(\App\Model\Category::class)->create([
            'name' => 'Hygiéne',
            'description' => $description,
            'photo' => 'uploads/categorie/hygiéne.jpg',
        ]);

        factory(\App\Model\Category::class)->create([
            'name' => 'Petit déjeuner',
            'description' => $description,
            'photo' => 'uploads/categorie/petit dej.jpg',
        ]);

        factory(\App\Model\Category::class)->create([
            'name' => 'Sucrerie et chocolat',
            'description' => $description,
            'photo' => 'uploads/categorie/chocolat.jpg',
        ]);

    }
}