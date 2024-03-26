
@extends('layout')

@section('content')

<div class="content-wrapper">
    <div class="form-container">
        <form method="POST" action="{{ route('play') }}">
            @csrf
            <div class="form-group">
                <label for="num_players">Nombre de joueurs :</label>
                <input type="number" id="num_players" name="num_players" min="2" max="6" required>
            </div>
            <div class="form-group">
                <label for="turn_duration">Durée des tours (en minutes) :</label>
                <input type="number" id="turn_duration" name="turn_duration" min="1" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Créer la partie">
            </div>
        </form>
    </div>

    <div id="map-container">
        <img src="{{ asset('assets/img/map240324.png') }}" alt="Carte des Aventuriers du Rail" id="map-image">
    </div>
</div>

@endsection
