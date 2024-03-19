

@extends('layout')

@section('title', 'Welcome to our site - Home')

@section('head-scripts')
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style_custom.css') }}" rel="stylesheet">


    <!-- <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-medieval.css') }}" rel="stylesheet"> -->
@endsection

@section('content')
    <header>
        <div class="hero-section">
            <img src="{{ asset('images/home-image-2.png') }}" alt="Welcome to our game" class="img-responsive">
        </div>
        <p class="lead text-center mb-4"></br>Embark on an epic journey and compete for the throne of the realm</p>
    </header>




        <section class="scoreboard">
            <h2 class="text-center mb-3">Leaderboard</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Player Name</th>
                            <th scope="col">Score</th>
                            <th scope="col">Cities Connected</th>
                            <th scope="col">Last Played</th>
                        </tr>
                    </thead>
                    <tbody>

                    <tr>
                            <td>1</td>
                            <td>Sir Lancelot</td>
                            <td>95</td>
                            <td>21</td>
                            <td>2024-03-15</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Lady Guinevere</td>
                            <td>91</td>
                            <td>19</td>
                            <td>2024-03-14</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Lord Percival</td>
                            <td>87</td>
                            <td>18</td>
                            <td>2024-03-13</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </section>
@endsection
</div>

@section('scripts')
<!-- blabla -->
@endsection
