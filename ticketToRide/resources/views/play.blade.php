@extends('layout')

@section('content')

@if($currentGame)
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Partie en cours!</h4>
        <p>Vous avez une partie en attente. Voici quelques détails :</p>
        <hr>
        <p class="mb-0">ID de la partie: {{ $currentGame->game_id }}</p>
        <p class="mb-0">État de la partie: {{ $currentGame->game_state }}</p>
        <p class="mb-0">Nombre maximal de joueurs: {{ $currentGame->game_max_players }}</p>
        <p class="mb-0">Durée du tour: {{ $currentGame->game_turn_time }} minutes</p>
        
        {{-- Lien ou bouton pour accéder à la partie, ajustez selon votre logique de route --}}
        <a href="{{ route('game.show', $currentGame->game_id) }}" class="btn btn-primary mt-3">Rejoindre la partie</a>
    </div>
@else
    <div class="alert alert-info" role="alert">
        Vous n'avez aucune partie en cours ! Créez-en une nouvelle ou rejoignez-en une dans l'onglet "Parties".
        
    </div>
@endif

@endsection
