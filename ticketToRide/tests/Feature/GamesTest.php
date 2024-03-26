<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Game;
use App\Models\User;

class GamesTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
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

    public function test_user_can_join_game()
    {
        // Créer un utilisateur simulé
        $user = User::factory()->create();

        // Créer une partie en attente
        $game = Game::create([
            'game_state' => 'En attente',
            'game_max_players' => 5,
            'game_turn_time' => 6,
            'player_id_creator' => $user->id,
        ]);


        // Envoyer une requête POST pour créer une partie
        $response = $this->actingAs($user)->post(route('games.join', $game));

        // Assurez-vous que la partie a été créée avec succès
        $response->assertStatus(302); // Assurez-vous que la redirection se fait
        $this->assertDatabaseHas('games', [
            'player_id_creator' => $user->id,
            // Ajoutez d'autres conditions si nécessaire
        ]);

        // Vérifier que la participation à la partie a été créée dans la base de données
        $this->assertDatabaseHas('participation', [
            'game_id' => $game->game_id, // Utilisez l'ID de la partie créée
            'player_id' => $user->id,
            // Ajoutez d'autres conditions si nécessaire
        ]);
    }
}
