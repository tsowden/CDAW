<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateGameTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_create_game_form()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/play')
                ->type('num_players', 4) // Remplir le champ du nombre de joueurs
                ->type('turn_duration', 5) // Remplir le champ de la durée des tours
                ->press('Créer la partie') // Cliquer sur le bouton de création de partie
                ->assertSee('La partie a été créée avec succès!'); // Vérifier un message de succès ou autre sur la page suivante
        });
    }
}
