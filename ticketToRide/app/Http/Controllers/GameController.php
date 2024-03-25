<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Participation;

class GameController extends Controller
{
    public function index(Request $request)
    {
        return view('play');
    }

    // permet de créer une nouvelle partie grâce au formulaire de la vue game
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'num_players' => ['required', 'integer', 'min:2', 'max:6'],
            'turn_duration' => ['required', 'integer', 'min:1'],
        ]);

        // Création de la partie dans la base de données
        $game = new Game();
        $game->game_state = 'En attente';
        $game->game_max_players = $validatedData['num_players'];
        $game->game_turn_time = $validatedData['turn_duration'];
        $game->player_id_creator = auth()->user()->id; // ou remplacez par l'ID du joueur créateur
        $game->save();

        // Redirection vers une page de confirmation ou de jeu
        return redirect()->route('play', $game->id);
    }


    // permet de d'afficher toutes les partie dans la vue games
    public function games()

    {
        $games = Game::all();
        return view('games', compact('games'));
    }

    public function join($game)
    {
        // Récupérer l'ID de l'utilisateur connecté
        $userId = auth()->user()->id;

        // Créer une nouvelle entrée dans la table participation
        Participation::create([
            'game_id' => $game,
            'player_id' => $userId,
        ]);
    }
}
