<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WagonCardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Supprime toutes les entrées existantes pour recommencer
        DB::table('wagon_cards')->delete();

        // Tableau des données des cartes wagons
        $wagonCards = [
            ['wc_color' => 'black', 'wc_image' => 'wc_black.png'],
            ['wc_color' => 'blue', 'wc_image' => 'wc_blue.png'],
            ['wc_color' => 'cyan', 'wc_image' => 'wc_cyan.png'],
            ['wc_color' => 'green', 'wc_image' => 'wc_green.png'],
            ['wc_color' => 'orange', 'wc_image' => 'wc_orange.png'],
            ['wc_color' => 'red', 'wc_image' => 'wc_red.png'],
            ['wc_color' => 'violet', 'wc_image' => 'wc_violet.png'],
            ['wc_color' => 'yellow', 'wc_image' => 'wc_yellow.png'],
            ['wc_color' => 'locomotive', 'wc_image' => 'wc_locomotive.png'],
        ];

        // Insère les données dans la table
        foreach ($wagonCards as $card) {
            DB::table('wagon_cards')->insert([
                'wc_color' => $card['wc_color'],
                'wc_image' => $card['wc_image'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
