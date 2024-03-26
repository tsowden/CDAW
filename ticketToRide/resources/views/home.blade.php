@extends('layout')

@section('title', 'Bienvenue sur Rail Quest - Accueil')

@section('head-scripts')
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('css/style_custom.css') }}" rel="stylesheet">
@endsection

@section('content')
<header class="hero-section">
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
    <p class="rules-text">Dans Rail Quest, la victoire se détermine par un système de points sophistiqué qui récompense la planification stratégique, la construction astucieuse de routes et l'accomplissement d'objectifs. Voici les détails :</p>
    </br>

    <h3>1. Construction de Routes</h3>
    <p class="rules-text">La construction de routes est essentielle pour gagner des points :</p>
    <ul class="rules-text">
        <li><strong>2 wagons</strong> : 2 points</li>
        <li><strong>3 wagons</strong> : 4 points</li>
        <li><strong>4 wagons</strong> : 7 points</li>
        <li><strong>5 wagons</strong> : 10 points</li>
        <li><strong>6 wagons</strong> : 15 points</li>
    </ul>
    </br>

    <h3>2. Destination Tickets</h3>
    <p class="rules-text">Les tickets de destination augmentent la compétitivité :</p>
    <p class="rules-text">Les joueurs marquent des points en connectant des villes spécifiées sur leurs Destination Tickets. Si réussi, ils ajoutent la valeur des points du ticket à leur score. Si échoué, les points sont déduits.</p>
</br>
    <h3>3. Le Plus Long Chemin Continu</h3>
    <p class="rules-text">Un bonus spécial est attribué pour le plus long chemin continu :</p>
    <p class="rules-text">Le joueur avec le plus long chemin continu de routes gagne un bonus de 10 points, crucial pour le résultat final du jeu.</p>
</br>
    <h3>4. Stratégie et Risques</h3>
    <p class="rules-text">L'importance de la stratégie et de la prise de risque calculée :</p>
    <p class="rules-text">La sélection de nouveaux Destination Tickets est un exercice d'équilibre entre risque et récompense, crucial pour la stratégie de victoire.</p>

    <p class="rules-text mt-4">Une planification minutieuse, une exécution stratégique, et une adaptation flexible sont essentielles pour naviguer efficacement dans le paysage compétitif de Rail Quest et remporter la victoire.</p>
</div>

            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<!-- Insérez ici les scripts JS personnalisés si nécessaire -->
@endsection
