<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('road', function (Blueprint $table) {
            $table->id('road_id');
            $table->string('road_color');
            $table->unsignedSmallInteger('road_length');
            $table->boolean('road_isOpen')->default(true);
            $table->foreignId('city_arrival_id')->constrained('city');
            $table->foreignId('city_departure_id')->constrained('city');
            $table->boolean('road_twin')->default(false);
            $table->foreignId('player_id_builder')->nullable()->constrained('player');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('road');
    }
}
