<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DestinationCard extends Model
{
    use HasFactory;

    protected $table = 'destination_cards';

    protected $primaryKey = 'dc_id';

    public $timestamps = false;

    protected $fillable = [
        'dc_image',
        'dc_points',
        'dc_isCompleted',
        'game_id',
        'player_id_dc_hand',
        'city_departure_id',
        'city_arrival_id',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id', 'game_id');
    }

    public function player()
    {
        return $this->belongsTo(User::class, 'player_id_dc_hand', 'id');
    }

    public function cityDeparture()
    {
        return $this->belongsTo(City::class, 'city_departure_id', 'city_id');
    }

    public function cityArrival()
    {
        return $this->belongsTo(City::class, 'city_arrival_id', 'city_id');
    }

}
