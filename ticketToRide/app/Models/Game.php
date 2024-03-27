<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $table = 'games'; // nom de la table dans la base de données
    public $timestamps = false;

    protected $primaryKey = 'game_id'; // nom de la clé primaire

    protected $fillable = [
        'game_state',
        'game_max_players',
        'game_turn_time',
        'player_id_creator',
    ];

    // gère les jointures naturelles entre game et participation
    public function participations()
    {
        return $this->hasMany(Participation::class, 'game_id', 'game_id');
    }
}
