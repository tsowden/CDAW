@extends('layout')

@section('content')
<div class="container">
    <h1>Lobby de la partie {{ $game->game_id }}</h1>
    <h2>Participants :</h2>
    <ul>
        @foreach ($participants as $participant)
        <li>{{ $participant->user->name }}</li>
        @endforeach
    </ul>
</div>
@endsection