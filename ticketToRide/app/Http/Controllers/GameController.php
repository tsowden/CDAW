<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Participation;
use App\Models\WagonCard;
use Illuminate\Support\Facades\Log;

class GameController extends Controller
{

    public function index(Request $request)
    {
        return view('play');
    }

    protected function createDeckForGame($gameId)
    {
        $colors = [
            'black' => 12, 'blue' => 12, 'cyan' => 12, 'green' => 12,
            'orange' => 12, 'red' => 12, 'violet' => 12, 'yellow' => 12,
            'locomotive' => 14
        ];

        foreach ($colors as $color => $quantity) {
            for ($i = 0; $i < $quantity; $i++) {
                \App\Models\WagonCard::create([
                    'wc_color' => $color,
                    'wc_image' => "wc_{$color}.png",
                    'game_id' => $gameId,

                ]);
            }
        }
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
            return redirect()->route('home')->with('error_message', 'Vous n\'avez pas accès à cette partie !');
        }

        $game = Game::findOrFail($gameId);

        // Ajout de la vérification de l'état de la partie
        if ($game->game_state !== 'En cours') {
            return redirect()->route('lobby.show', ['gameId' => $gameId])->with('warning_message', 'La partie n\'a pas encore commencé. Veuillez attendre dans le lobby.');
        }

        // Définissez ici la liste des couleurs pour les cartes wagon
        $colors = ['black', 'blue', 'cyan', 'green', 'orange', 'red', 'violet', 'yellow', 'locomotive'];

        // Initiez une collection pour tenir les comptes de cartes par couleur initialisés à 0
        $cardsCountByColor = collect($colors)->flip()->mapWithKeys(function ($item, $color) {
            return [$color => ['count' => 0]];
        });

        // Mise à jour des comptes de cartes réels pour l'utilisateur dans cette partie
        $realCounts = WagonCard::where('game_id', $gameId)
            ->where('player_id_wc_hand', $user->id)
            ->selectRaw('wc_color, COUNT(*) as count')
            ->groupBy('wc_color')
            ->get()
            ->keyBy('wc_color');

        // Fusion des données réelles avec la structure initialisée
        $cardsCountByColor = $cardsCountByColor->merge($realCounts);

        $game = Game::with('participations.user')->findOrFail($gameId);

        // Liste des participants à renvoyer dans play pour que l'on sache quand on arrive qui est dans la partie avec nous
        $participants = $game->participations()->with('user')->get()->pluck('user.name');


        $randomCardId = WagonCard::where('game_id', $gameId)
            ->whereNull('player_id_wc_hand')
            ->inRandomOrder()
            ->first()
            ->wc_id ?? null;

        $visibleCards = WagonCard::where('game_id', $gameId)
            ->whereNull('player_id_wc_hand')
            ->inRandomOrder()
            ->take(5)
            ->get();

        return view('play', [
            'game' => $game, 'participants' => $participants,
            'cardsCountByColor' => $cardsCountByColor,
            'colors' => $colors,
            'randomCardId' => $randomCardId,
            'visibleCards' => $visibleCards
        ]);
    }


    public function pickCard(Request $request, $cardId)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Non autorisé'], 401);
        }
    
        $card = WagonCard::where('wc_id', $cardId)
                         ->whereNull('player_id_wc_hand')
                         ->first();
    
        if (!$card) {
            return response()->json(['error' => 'Carte non trouvée ou déjà prise'], 404);
        }
    
        // Attribuer la carte à l'utilisateur
        $card->player_id_wc_hand = $user->id;
        $card->save();
    
        // Sélectionner et préparer une nouvelle carte aléatoire
        $newCard = WagonCard::where('game_id', $card->game_id)
                            ->whereNull('player_id_wc_hand')
                            ->inRandomOrder()
                            ->first();
    
        // Mettre à jour le total des cartes de cette couleur pour l'utilisateur
        $newTotal = WagonCard::where('game_id', $card->game_id)
                             ->where('player_id_wc_hand', $user->id)
                             ->where('wc_color', $card->wc_color)
                             ->count();
    
        // Répondre avec les informations nécessaires pour la mise à jour du frontend
        return response()->json([
            'success' => true,
            'cardType' => $card->wc_color,
            'newTotal' => $newTotal,
            'newCard' => $newCard ? [
                'wc_id' => $newCard->wc_id,
                'wc_image' => asset('images/'.$newCard->wc_image),
                'wc_color' => $newCard->wc_color,
            ] : null,
        ]);
    }
    

    public function useWagonCards(Request $request, $gameId)
    {
        Log::debug("useWagonCards called with gameId: $gameId");
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Non autorisé'], 401);
        }

        $color = $request->input('color');
        $amount = $request->input('amount');

        // Récupérer les cartes correspondant à la couleur et au joueur, puis en déduire la quantité nécessaire
        $cards = WagonCard::where('game_id', $gameId)
                        ->where('player_id_wc_hand', $user->id)
                        ->where('wc_color', $color)
                        ->limit($amount)
                        ->get();

        if ($cards->count() < $amount) {
            return response()->json(['error' => 'Pas assez de cartes'], 400);
        }

        foreach ($cards as $card) {
            // Ici vous pourriez mettre à jour ou supprimer les cartes selon votre logique de jeu
            $card->delete(); // Exemple : Suppression des cartes utilisées
        }

        // Calculer la nouvelle quantité de cartes de cette couleur pour le joueur
        $newTotal = WagonCard::where('game_id', $gameId)
                            ->where('player_id_wc_hand', $user->id)
                            ->where('wc_color', $color)
                            ->count();

        return response()->json([
            'success' => true,
            'newTotal' => $newTotal
        ]);
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

    // une fois la partie créé avec store, on veut lancer la partie avec la méthode startGame
    public function startGame($gameId)
    {
        $game = Game::findOrFail($gameId);

        // Vérifier si l'utilisateur actuel est le créateur de la partie
        if (auth()->id() !== $game->player_id_creator) {
            return redirect()->route('lobby.show', $gameId)->with('error_message', 'Seul le créateur de la partie peut la lancer.');
        }

        // Changer l'état de la partie à "En cours"
        $game->game_state = 'En cours';
        $game->save();


        // Appel méthode createDeckForGame qui ajoute les cartes wagons à la partie
        $this->createDeckForGame($game->game_id);


        return redirect()->route('game.play', $gameId)->with('success_message', 'La partie a commencé !');
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
