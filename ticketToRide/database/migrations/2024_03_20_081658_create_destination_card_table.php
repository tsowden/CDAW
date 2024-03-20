<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationCardTable extends Migration
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
            $table->unsignedInteger('dc_points');
            $table->boolean('dc_isCompleted')->default(false);
            $table->foreignId('player_id_dc_hand')->nullable()->constrained('players')->onDelete('set null');
            $table->foreignId('city_departure_id')->constrained('cities');
            $table->foreignId('city_arrival_id')->constrained('cities');
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
