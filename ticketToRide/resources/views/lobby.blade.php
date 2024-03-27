@extends('layout')

@section('content')
{{-- afficher le message dans la vue lobby alors qu'il a été émis dans la vue précédente --}}
@if (session('success_message'))
<div class="alert alert-success">
    {{ session('success_message') }}
</div>
@endif

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