@extends('layout')

@section('content')
    <h1>Partie en cours : {{ $game->game_id }}</h1>
    <p>Durée des tours : {{ $game->game_turn_timeturn_duration }} secondes</p>
    <p>Nombre max de joueurs : {{ $game->game_max_players}}</p>
    
    <h2>Participants :</h2>
    <ul>
        @foreach ($game->participations as $participation)
            <li>{{ $participation->user->name }}</li>
        @endforeach
    </ul>

    {{-- Ici, vous pouvez ajouter la logique de jeu spécifique --}}
@endsection
