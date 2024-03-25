<style>
    /* Style pour le texte en blanc */
    .navbar-nav li a {
        color: white !important;
        /* Couleur du texte en blanc */
        padding: 0.5rem 1rem;
        /* Espacement autour du texte */
        margin-right: 10px;
        /* Espacement entre les éléments du menu */
    }
</style>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Nizar Mhaya</a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li><a href="{{ route('accueil') }}">Accueil</a></li>
                <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                <li><a href="{{ route('cv') }}">CV</a></li>
                <li><a href="{{ route('games') }}">Games</a></li>
                <li><a href="{{ route('game') }}">Game</a></li>
                <li><a href="{{ route('chat') }}">Chat</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                <li><a href="{{ route('dashboard') }}">Login</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>

        </div>
    </div>
</nav>