<div class="header">
    <div class="container row-5 group">
        <img class="wings" src="{{ asset('images/wings.png') }}" alt="" width="40" height="19">
        <span class="logo-text">Toniz' Game</span>
        <nav class="links-2 group">
            <a href="{{ url('/') }}" class="nav-link heroes-2">Accueil</a>


            <!-- visible si user authentifié -->
            @auth
            <a href="{{ url('/play') }}" class="nav-link contact-2">Jouer</a>
            <a href="{{ url('/games') }}" class="nav-link contact-2">Parties</a>
            <a href="{{ url('/contact') }}" class="nav-link contact-2">Contact</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link gallery-2">
                {{ Auth::user()->name }}: Se déconnecter
            </a>

            <!-- formulaire de déconnexion -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            @else
            <!-- visibles si user pas connecté -->
            <a href="{{ route('login') }}" class="nav-link gallery-2">Se connecter</a>
            <a href="{{ route('register') }}" class="nav-link gallery-2">S'inscrire</a>
            @endauth
        </nav>
    </div>
</div>
