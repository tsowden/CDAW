<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Game;
use App\Models\User;


class Participation extends Model
{
    protected $table = 'participation'; // Assurez-vous que cela correspond au nom de votre table dans la base de données

    public function user() {
        return $this->belongsTo(User::class, 'player_id');
    }

    public function game() {
        return $this->belongsTo(Game::class, 'game_id');
    }
}
