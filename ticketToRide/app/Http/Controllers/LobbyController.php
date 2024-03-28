<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class LobbyController extends Controller
{
    public function show($gameId)
    {
        // Récupérer les données de la partie
        $game = Game::findOrFail($gameId);

        // Récupérer la liste des participants de la game en question
        $participants = $game->participations()->get();

        // Passer les données à la vue du lobby
        return view('lobby', ['game' => $game, 'participants' => $participants]);
    }

    public function leave($gameId)
{
    $userId = auth()->user()->id;

    \App\Models\Participation::where('game_id', $gameId)
                              ->where('player_id', $userId)
                              ->delete();

    return redirect()->route('games')->with('success_message', 'Vous avez quitté le lobby.');
}

}
