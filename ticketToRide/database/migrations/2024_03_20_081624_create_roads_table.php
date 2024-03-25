<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roads', function (Blueprint $table) {
            $table->id('road_id');
            $table->string('road_color');
            $table->unsignedSmallInteger('road_length');
            $table->boolean('road_isOpen')->default(true);
            $table->foreignId('city_arrival_id')->references('city_id')->on('cities');
            $table->foreignId('city_departure_id')->references('city_id')->on('cities');
            $table->boolean('road_twin')->default(false);
            $table->foreignId('player_id_builder')->nullable()
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
        Schema::dropIfExists('roads');
    }
}
