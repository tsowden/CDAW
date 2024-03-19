<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Toniz Game')</title>
    <meta name="description" content="@yield('meta_description', 'Dragonic Overlords - The Ultimate Fantasy Experience')">
    <meta name="keywords" content="@yield('meta_keywords', 'fantasy, gaming, dragonic, overlords')">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900" rel="stylesheet">
    <link href="{{ asset('css/custom-medieval.css') }}" rel="stylesheet">
    
    @yield('head')
</head>
<body class="medieval-fantasy-theme">
    <div class="wrapper">
        @include('partials.header')

        <main>
            @yield('content')
        </main>

        @include('partials.footer')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    @yield('scripts')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
