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
        Vous n'avez aucune partie en cours ! Créez-en une nouvelle ci-dessous ou rejoignez en une via l'onglet "Parties".
    </div>
    
    {{-- Formulaire pour créer une nouvelle partie --}}
    <div id="map-container">
        <img src="{{ asset('assets/img/map240324.png') }}" alt="Carte des Aventuriers du Rail" id="map-image">
    </div>
    
    <form method="POST" action="{{ route('game.store') }}">
        @csrf
        <label for="num_players">Nombre de joueurs :</label>
        <input type="number" id="num_players" name="num_players" min="2" max="6" required>
        <br>
        <label for="turn_duration">Durée des tours (en minutes) :</label>
        <input type="number" id="turn_duration" name="turn_duration" min="1" required>
        <br>
        <input type="submit" value="Créer la partie">
    </form>

@endif

@endsection
