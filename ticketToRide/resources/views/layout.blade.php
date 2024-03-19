<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ticket To Ride - Explore & Conquer')</title>
    <meta name="description" content="@yield('meta_description', 'Ticket To Ride - Start your railway adventure!')">
    <meta name="keywords" content="@yield('meta_keywords', 'boardgame, strategy, railway, tickettoride')">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-theme.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-medieval.css') }}" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900" rel="stylesheet">
    <!-- <link href="{{ asset('css/custom-medieval.css') }}" rel="stylesheet"> -->

    @yield('head')
</head>
<body class="medieval-fantasy-theme">

    @include('partials.header')
    <!-- <div class="container mt-5"> -->
        <main class="py-4">
            @yield('content')
        </main>
    <!-- </div> -->

    @include('partials.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    @yield('scripts')

</body>
</html>
