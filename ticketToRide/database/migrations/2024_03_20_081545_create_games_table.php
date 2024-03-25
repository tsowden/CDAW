<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id('game_id'); 
            $table->string('game_state'); // 'waiting', 'in_progress', 'finished'
            $table->unsignedInteger('game_max_players');
            $table->unsignedInteger('game_turn_time');
            $table->foreignId('player_id_creator')
                ->references('id')->on('users') 
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
