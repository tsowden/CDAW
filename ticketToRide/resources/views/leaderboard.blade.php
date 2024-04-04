@extends('layout')

@section('content')
<section class="page-section" id="leaderboard">
    <div class="container">
        <h2>Leaderboard</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>HightScore</th>
                    <!-- Ajoutez d'autres colonnes si nécessaire -->
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>8000</td>
                    <!-- Ajoutez d'autres cellules si nécessaire -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection