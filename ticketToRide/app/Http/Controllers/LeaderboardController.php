<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LeaderboardController extends Controller
{

    public function index(Request $request)
    {
        $users = User::all();
        return view('leaderboard', ['users' => $users]);
    }
}
