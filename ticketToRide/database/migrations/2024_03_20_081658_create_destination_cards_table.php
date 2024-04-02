<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination_cards', function (Blueprint $table) {
            $table->id('dc_id');
            $table->string('dc_image');

            $table->unsignedInteger('dc_points');
            $table->boolean('dc_isCompleted')->default(false);
            

            $table->foreignId('game_id')->nullable()->references('game_id')->on('games')->onDelete('cascade');

            $table->foreignId('player_id_dc_hand')->nullable()->references('id')->on('users')->onDelete('set null');
            
            $table->foreignId('city_departure_id')->references('city_id')->on('cities')->onDelete('restrict');
            
            $table->foreignId('city_arrival_id')->references('city_id')->on('cities')->onDelete('restrict');
            
            $table->unique(['city_departure_id', 'city_arrival_id'], 'unique_city_pair');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destination_cards');
    }
}
