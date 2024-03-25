<!-- resources/views/games.blade.php -->

@extends('layout')

@section('content')
<h1 div style="padding-top: 130px">Liste des parties disponibles</h1>
<br><br>
<table>
    <thead>
        <tr>
            <th>ID de la partie</th>
            <th>État de la partie</th>
            <th>Nombre maximum de joueurs</th>
            <th>Durée du tour</th>
            <th>ID du créateur de la partie</th>
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
        </tr>
        @endforeach
    </tbody>
</table>
<br><br><br><br><br>
@endsection