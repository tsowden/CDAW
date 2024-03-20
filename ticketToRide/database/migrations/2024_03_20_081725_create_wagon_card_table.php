<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWagonCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wagon_cards', function (Blueprint $table) {
            $table->id('wc_id');
            $table->string('wc_color');
            $table->string('wc_image');
            $table->foreignId('player_id_wc_hand')->nullable()->constrained('players')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wagon_cards');
    }
}
