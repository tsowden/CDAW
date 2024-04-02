<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Notez que le namespace de WagonCardsTableSeeder n'a pas besoin d'être importé
// si DatabaseSeeder et WagonCardsTableSeeder sont dans le même namespace.

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Appellez votre seeder ici
        $this->call([
            WagonCardsTableSeeder::class,
        ]);
    }
}
