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

    public function play($gameId)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login')->with('error_message', 'Vous devez être connecté pour accéder à cette page.');
        }

        // Vérifiez si l'utilisateur fait partie de la partie
        $participationExists = Participation::where('game_id', $gameId)
            ->where('player_id', $user->id)
            ->exists();

        if (!$participationExists) {
            // Si l'utilisateur n'est pas un participant de la partie, redirigez avec un message d'erreur
            return redirect()->route('home')->with('error_message', 'Vous n\'avez pas accès à cette partie !');
        }

        // Si l'utilisateur est un participant, continuez à charger la page du jeu
        $game = Game::with('participations.user')->findOrFail($gameId);

        // Liste des participants à renvoyer dans play pour que l'on sache quand on arrive qui est dans la partie avec nous
        $participants = $game->participations()->with('user')->get()->pluck('user.name');
        echo ($participants);

        return view('play', ['game' => $game, 'participants' => $participants]);
    }


    public function create_game(Request $request)
    {
        return view('create_game');
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

        // Appel de la méthode join pour ajouter automatiquement l'utilisateur à la partie
        $this->join($game->game_id);

        // Redirection vers une page de confirmation ou de jeu
        return redirect()->route('lobby.show', $game->game_id)->with('success_message', 'La partie a été créée avec succès!');
    }


    // permet de d'afficher toutes les partie dans la vue games
    public function games()
    {
        // Récupérer toutes les parties avec l'état 'En attente' et charger les informations du créateur et des participations
        $games = Game::with(['participations', 'creator'])->where('game_state', 'En attente')->get();

        // Passer les jeux récupérés à la vue
        return view('games', compact('games'));
    }

    public function join($gameidentifiant)
    {
        // Récupérer l'ID de l'utilisateur connecté
        $userId = auth()->user()->id;

        // Récupérer le jeu concerné
        $game = Game::findOrFail($gameidentifiant);

        // Compter le nombre actuel de participants
        $nbParticipants = $game->participations()->count();

        if ($nbParticipants >= $game->game_max_players) {
            return redirect()->route('lobby.show', $gameidentifiant)
                ->with('error_message', 'Le lobby est déjà complet.');
        }

        // Si le lobby n'est pas complet, ajoute le joueur au jeu
        Participation::create([
            'game_id' => $gameidentifiant,
            'player_id' => $userId,
        ]);

        // Redirige vers le bon lobby
        return redirect()->route('lobby.show', $gameidentifiant);
    }
}
