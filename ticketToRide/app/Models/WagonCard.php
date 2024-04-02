<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WagonCard extends Model

{
    protected $primaryKey = 'wc_id'; 

    protected $fillable = ['wc_color', 'wc_image', 'game_id'];

    protected $table = 'wagon_cards';

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }
}
