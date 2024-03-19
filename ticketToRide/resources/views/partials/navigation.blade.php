{{-- partials/navigation.blade.php --}}

<nav class="navbar-custom">
    <div class="container">
        <a class="navbar-brand-custom" href="{{ url('/') }}">
            <img src="/path-to-your-logo.png" alt="Logo">
        </a>
        <ul class="navbar-nav-custom">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/heroes') }}">Leaderboard</a></li>
            <li><a href="{{ url('/gallery') }}">My Stats</a></li>
            <li><a href="{{ url('/store') }}">Profile</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
    </div>
</nav>
