@extends('layout')

@section('title', 'Bienvenue sur Rail Quest - Accueil')

@section('head-scripts')
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('css/style_custom.css') }}" rel="stylesheet">
@endsection


@section('content')
<header class="hero-section">
    @if(session('error_message'))
    <div class="alert alert-danger">
        {{ session('error_message') }}
    </div>
    @endif
    <img src="{{ asset('images/home-image-2.png') }}" alt="Bienvenue sur Rail Quest" class="img-fluid">
    <div class="overlay"></div>
    <div class="hero-section-content">
        </br></br>
        <p class="lead text-center">Embarquez dans une aventure épique et concourez pour le trône du royaume dans le monde captivant de Rail Quest.</p>
    </div>
</header>

<section class="mt-5">
    <div class="container-rules">
        <div class="row-rules">
            <div class="col-lg-12">
                <h2 class="text-center section-title title-rules">Règles du Jeu</h2>
                <div class="container">
                    <h2 class="mt-5">Système de Points de Rail Quest</h2>
                    <p class="rules-text">Dans Rail Quest, la victoire se détermine par un système de points qui récompense la planification stratégique, la construction astucieuse de routes et l'accomplissement d'objectifs.</p>
                    </br>

                    <h3>1. Construction de Routes</h3>
                    <p class="rules-text">La construction de routes fait gagner des points en fonction de leur longueur :</p>
                    <ul class="rules-text">
                        <li><strong>1 wagon</strong> : 1 point</li>
                        <li><strong>2 wagons</strong> : 2 points</li>
                        <li><strong>3 wagons</strong> : 4 points</li>
                        <li><strong>4 wagons</strong> : 7 points</li>
                        <li><strong>5 wagons</strong> : 10 points</li>
                        <li><strong>6 wagons</strong> : 15 points</li>
                    </ul>
                    </br>

                    <h3>2. Tickets Destination</h3>
                    <p class="rules-text">Les tickets de destination peuvent apporter des points :</p>
                    <p class="rules-text">Les joueurs marquent des points en connectant des villes spécifiées sur leurs Tickets Destination. Si réussi, ils ajoutent la valeur des points du ticket à leur score. Sinon, les points sont déduits.</p>
                    </br>
                    <h3>3. Le Plus Long Chemin Continu</h3>
                    <p class="rules-text">Un bonus spécial est attribué pour le plus long chemin continu :</p>
                    <p class="rules-text">Le joueur avec le plus long chemin continu de routes gagne un bonus de 10 points, crucial pour le résultat final du jeu.</p>
                    </br>
                    <h3>4. Stratégie et Risques</h3>
                    <p class="rules-text">L'importance de la stratégie et de la prise de risque calculée :</p>
                    <p class="rules-text">La sélection de nouveaux Tickets Destination est un exercice d'équilibre entre risque et récompense.</p>

                    <p class="rules-text mt-4">Une planification stratégique, une exécution tactique, et une bonne adaptation sont essentielles pour naviguer efficacement dans le paysage compétitif de Rail Quest et remporter la victoire !</p>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<!-- Insérez ici les scripts JS personnalisés si nécessaire -->
@endsection