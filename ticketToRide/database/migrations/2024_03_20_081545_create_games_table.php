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
            $table->bigIncrements('game_id');
            $table->string('game_state');
            $table->unsignedInteger('game_max_players');
            $table->unsignedInteger('game_turn_time');
            $table->unsignedBigInteger('player_id_creator');
            $table->unsignedBigInteger('current_player_id')->nullable();
            $table->timestamps(); 

            $table->foreign('player_id_creator')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->foreign('current_player_id') 
                  ->references('id')->on('users')
                  ->onDelete('set null'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropForeign(['player_id_creator']);
            $table->dropForeign(['current_player_id']); 
        });

        Schema::dropIfExists('games');
    }
}
