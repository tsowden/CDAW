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
        position: relative;
        display: flex;
        /* Prend tout l'espace disponible restant */
        background-color: black;
        width: 33.5cm;
        align-items: flex-start;
    }

    .map-button {
        position: absolute;
        width: 20px;
        /* Largeur du bouton */
        height: 20px;
        /* Hauteur du bouton */
        background-color: darkred;

        opacity: 0.5;
        /* Couleur de fond du bouton */
        border: none;
        /* Supprimer la bordure */
        border-radius: 50%;
        /* Rendre le bouton circulaire */
        cursor: pointer;
        /* Curseur pointeur */
    }



    /* Style de la bande à gauche pour afficher les cartes du joueur */
    .side-panel.left-panel {
        flex-basis: 20%;
        /* Largeur fixe de la bande à gauche */
        background-color: lightgray;
        background-image: radial-gradient(#523814, black);
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
        background-color: grey;
        background-image: url("images/fond_parchemin.png");

    }

    /* Style de la bande en bas pour afficher les cartes à piocher */
    .card-draw {
        /* flex-basis: 100%; */
        flex-basis: 20%;

        /* Prend toute la largeur disponible */
        background-color: lightyellow;
        background-image: radial-gradient(#523814, black);
    }
</style>




<div class="play-container">
    <div class="map-container">


        <div id="map-container">
            <img src="{{ asset('assets/img/map240324.png') }}" alt="Carte des Aventuriers du Rail" id="map-image">
            <!-- Boutons sur la carte -->
            <button class="map-button" style="top: 150px; left: 85px;" id="button-Foulestaque"></button>
            <button class="map-button" style="top: 185px; left: 218px;" id="button-Apex"></button>
            <button class="map-button" style="top: 50px; left: 240px;" id="button-Java"></button>
            <button class="map-button" style="top: 275px; left: 62px;" id="button-Ruby"></button>
            <button class="map-button" style="top: 500px; left: 500PX;" id="button-Toniz"></button>
            <button class="map-button" style="top: 419px; left: 517PX;" id="button-Falcon"></button>
            <button class="map-button" style="top: 357px; left: 655PX;" id="button-Ariana"></button>
            <button class="map-button" style="top: 230px; left: 767PX;" id="button-Templake"></button>
            <button class="map-button" style="top: 437px; left: 318PX;" id="button-Swift"></button>
            <button class="map-button" style="top: 510PX; left: 30PX;" id="button-Kotlin"></button>
            <button class="map-button" style="top: 611PX; left: 177PX;" id="button-Rust"></button>
            <button class="map-button" style="top: 622PX; left: 370PX;" id="button-Scala"></button>
            <button class="map-button" style="top: 590PX; left: 510PX;" id="button-Perl"></button>
            <button class="map-button" style="top: 625PX; left: 587PX;" id="button-Lua"></button>
            <button class="map-button" style="top: 154PX; left: 608PX;" id="button-Haskell"></button>
            <button class="map-button" style="top: 330PX; left: 822PX;" id="button-Elixir"></button>
            <button class="map-button" style="top: 350PX; left: 908PX;" id="button-Dart"></button>
            <button class="map-button" style="top: 270PX; left: 912PX;" id="button-Groovy"></button>
            <button class="map-button" style="top: 135PX; left: 865PX;" id="button-Fortran"></button>
            <button class="map-button" style="top: 76PX; left: 745PX;" id="button-Laraville"></button>
            <button class="map-button" style="top: 41PX; left: 413PX;" id="button-Assembly"></button>
            <button class="map-button" style="top: 207PX; left: 382PX;" id="button-Pascal"></button>
            <button class="map-button" style="top: 69PX; left: 1100PX;" id="button-Ada"></button>
            <button class="map-button" style="top: 150PX; left: 1140PX;" id="button-Cobol"></button>
            <button class="map-button" style="top: 227PX; left: 1153PX;" id="button-Julia"></button>
            <button class="map-button" style="top: 545PX; left: 1105PX;" id="button-Erlang"></button>
            <button class="map-button" style="top: 275PX; left: 552PX;" id="button-Prolog"></button>
            <button class="map-button" style="top: 578PX; left: 715PX;" id="button-Lisp"></button>
            <button class="map-button" style="top: 580PX; left: 932PX;" id="button-Elm"></button>
            <button class="map-button" style="top: 133PX; left: 460PX;" id="button-Delphi"></button>
            <button class="map-button" style="top: 345PX; left: 125PX;" id="button-Python"></button>
            <button class="map-button" style="top: 551PX; left: 175PX;" id="button-Crystal"></button>

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