<div class="header">
    <div class="container row-5 group">
        <img class="wings" src="{{ asset('images/wings.png') }}" alt="" width="40" height="19">
        <span class="logo-text">Toniz</span>
        <nav class="links-2 group">
            <a href="{{ url('/') }}" class="nav-link heroes-2">Accueil</a>

            @if($isAuthenticated)
                @if(!$isInGame)
                    <!-- Boutons affichés si l'utilisateur n'est dans aucune partie en cours -->
                    <a href="{{ url('/games') }}" class="nav-link contact-2">Rejoindre une partie</a>
                    <a href="{{ url('/create_game') }}" class="nav-link contact-2">Créer une partie</a>
                @else
                    @if($isInGame && $currentGameId)
                        <a href="{{ route('game.play', ['gameId' => $currentGameId]) }}" class="nav-link contact-2">Jouer</a>
                    @endif
                @endif

                <a href="{{ url('/contact') }}" class="nav-link contact-2">Contact</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link gallery-2">
                    {{ Auth::user()->name }}: Se déconnecter
                </a>

                <!-- Formulaire de déconnexion -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <!-- Liens visibles si l'utilisateur n'est pas connecté -->
                <a href="{{ route('login') }}" class="nav-link gallery-2">Se connecter</a>
                <a href="{{ route('register') }}" class="nav-link gallery-2">S'inscrire</a>
            @endif
        </nav>
    </div>
</div>
