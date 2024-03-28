@extends('layout')

@section('content')

<div class="content-wrapper">
    <h1 class="creation-title">Quai n°{{ $game->game_id }}</h1>

    @if(session('error_message'))
        <div class="alert alert-danger" role="alert">
            {{ session('error_message') }}
        </div>
    @else
        <p>Embarquement en cours ! Veuillez patienter quelques instants le temps que l'administrateur de la partie démarre !</p>
    @endif

    <div class="image-container">
        <img src="{{ asset('images/lobby_image.png') }}" alt="Image du lobby">
    </div>
    
    <div class="info-partie">
        <p><strong>Durée des tours :</strong> {{ $game->game_turn_time }} secondes</p>
        <p><strong>Nombre max de joueurs :</strong> {{ $game->game_max_players }}</p>
    </div>

    <div class="form-container">
        <h2>Participants :</h2>
        <ul>    
            @foreach ($participants as $participant)
            <li>{{ $participant->user->name }}</li>
            @endforeach
        </ul>
    </div>

    <div class="launch-button">
    <a href="{{ route('game.play', $game->game_id) }}" class="btn btn-primary">Lancer la partie !</a>
</div>

    <div class="quit-button">
        <form action="{{ route('lobby.leave', $game->game_id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-warning">Quitter le lobby</button>
        </form>
    </div>


</div>

@endsection
