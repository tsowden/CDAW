<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;

    protected $table = 'participation';
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'game_id',
        'player_id',
        'participation_score',
        'participation_isWin',
    ];

    //Définit la relation entre la participation et l'utilisateur
    // Cette fonction est utilisée dans la vue lobby pour obtenir les noms des participants
    public function user()
    {
        return $this->belongsTo(User::class, 'player_id');
    }
}
