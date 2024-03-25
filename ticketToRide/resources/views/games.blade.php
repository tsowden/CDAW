<!-- resources/views/games.blade.php -->

@extends('layout')
@section('title', 'Welcome to our site - Home')

@section('head-scripts')
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('css/style_custom.css') }}" rel="stylesheet">
@endsection


@section('content')

<section class="scoreboard">
    <h2 class="text-center mb-3">Liste des parties créées</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th scope="col">ID de la partie</th>
                    <th scope="col">Etat de la partie</th>
                    <th scope="col">Nombre tours</th>
                    <th scope="col">Durée tours</th>
                    <th scope="col">Id créateur</th>
                </tr>
            </thead>
            <tbody>
                @foreach($games as $game)
                <tr>
                    <td>{{ $game->game_id }}</td>
                    <td>{{ $game->game_state }}</td>
                    <td>{{ $game->game_max_players }}</td>
                    <td>{{ $game->game_turn_time }}</td>
                    <td>{{ $game->player_id_creator }}</td>
                    <td>
                        <form action="{{ route('games.join', $game->game_id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Rejoindre</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            <tbody>

                @endsection