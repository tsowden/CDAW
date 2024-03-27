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
}
