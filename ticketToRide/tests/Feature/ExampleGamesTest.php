<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleGamesTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_games_affiche_texte_liste_parties_creees()
    {

        $response = $this->get('/games');

        $response->assertStatus(200);
        $response->assertSeeText('Liste des parties créées');
    }
}
