<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Nizar Mhaya</a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                @foreach ($mymenu as $pageId => $pageParameters)
                @php
                $link = route($pageId); // Génère le lien vers la route correspondant à la page
                $class = ($pageId == $currentPageId) ? 'currentpage' : ''; // Ajoute la classe 'currentpage' si la page est active
                @endphp
                <li class="nav-item mx-0 mx-lg-1 {{ $class }}">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded {{ $class }}" href="{{ $link }}">{{ $pageParameters[0] }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>