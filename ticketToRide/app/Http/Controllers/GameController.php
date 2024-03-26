<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index(Request $request)
{
    $currentGame = null;

    if (Auth::check()) {
        $userId = Auth::id(); // Obtenez l'ID de l'utilisateur connecté

        // Effectuez une jointure pour trouver un jeu "En attente" auquel l'utilisateur participe
        $currentGame = DB::table('games')
                        ->join('participation', 'games.game_id', '=', 'participation.game_id')
                        ->where('participation.player_id', $userId)
                        ->where('games.game_state', 'En attente')
                        ->select('games.*') // Sélectionnez les colonnes que vous souhaitez récupérer
                        ->first(); // Récupérez la première instance qui correspond aux critères
    }

    return view('play', compact('currentGame'));
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
}
