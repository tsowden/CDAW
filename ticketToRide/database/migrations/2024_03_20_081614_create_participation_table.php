<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participation', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('game_id')->references('game_id')->on('games')->onDelete('cascade');
            $table->foreignId('player_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('participation_score')->default(0);
            $table->boolean('participation_isWin')->default(false);
        });
    }
    
    
    
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participation');
    }
}
