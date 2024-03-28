@extends('layout')

@section('content')

<div class="content-wrapper">
    <h1 class="creation-title">Création de partie</h1>
    <div class="form-container">
        <!-- Modification ici : action utilise maintenant route('game.store') -->
        <form method="POST" action="{{ route('game.store') }}">
            @csrf
            <div class="form-group">
                <label for="num_players" class="form-label">Nombre de joueurs :</label>
                <input type="number" id="num_players" name="num_players" class="form-input" min="2" max="6" required>
            </div>
            <div class="form-group">
                <label for="turn_duration" class="form-label">Durée des tours (en secondes) :</label>
                <input type="number" id="turn_duration" name="turn_duration" class="form-input" min="1" required>
            </div>
            <div class="form-group">
                <input type="submit" class="form-button" value="Créer la partie">
            </div>
        </form>
    </div>
</div>

@endsection
