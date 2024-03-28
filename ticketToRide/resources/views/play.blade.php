@extends('layout')

@section('content')

<style>
    /* Style du conteneur principal */
    .play-container {
        display: flex;
        flex-direction: row;
        /* Disposition horizontale des éléments */
        justify-content: space-between;
        /* Espacement égal entre les éléments */
        align-items: stretch;
        /* Alignement des éléments sur la hauteur */
        height: 100vh;
        /* Hauteur de la page en plein écran */
    }

    /* Style du bloc central pour afficher la carte */
    .map-container {
        flex: 1;
        /* Prend tout l'espace disponible restant */
        background-color: lightblue;
    }


    /* Style de la bande à gauche pour afficher les cartes du joueur */
    .side-panel.left-panel {
        flex-basis: 20%;
        /* Largeur fixe de la bande à gauche */
        background-color: lightgreen;
    }

    .left-panel {
        /* Style spécifique pour le panneau gauche */
        order: -1;
        /* Met le panneau gauche en premier dans l'ordre visuel */
    }

    /* Style de la bande à droite pour afficher le nom des autres joueurs et le chat */
    .side-panel.right-panel {
        flex-basis: 20%;
        order: 2;
        /* Largeur fixe de la bande à droite */
        background-color: lightcoral;
    }

    /* Style de la bande en bas pour afficher les cartes à piocher */
    .card-draw {
        /* flex-basis: 100%; */
        flex-basis: 20%;

        /* Prend toute la largeur disponible */
        background-color: lightyellow;
    }
</style>




<div class="play-container">
    <div class="map-container">


        <div id="map-container">
            <img src="{{ asset('assets/img/map240324.png') }}" alt="Carte des Aventuriers du Rail" id="map-image">
        </div>

    </div>
    <div class="side-panel left-panel">
        <!-- Bande à gauche pour afficher les cartes du joueur -->
        Cartes du joueur
    </div>
    <div class="side-panel right-panel">
        Autres joueurs & Chat
        <!-- Bande à droite pour afficher le nom des autres joueurs et le chat -->
        <div id="message_body">
            <script defer src="{{ asset('js/script.js') }}"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
            <div id="utilisateur" data-nom="{{ auth()->user()->name }}" style="display: none;"></div>
            <div id="message-container"></div>
            <form id="send-container">
                <input type="text" id="message-input">
                <button type="submit" id="send-button"><i class="bi bi-arrow-up-circle-fill"></i></button>
            </form>
        </div>

    </div>
    <div class="card-draw">
        <!-- Bande en bas pour afficher les cartes à piocher -->
        Cartes à piocher
    </div>
</div>

@endsection