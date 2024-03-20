<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friendships', function (Blueprint $table) {
            $table->id('friendship_id');
            $table->foreignId('player_id_1')->constrained('players')->onDelete('cascade');
            $table->foreignId('player_id_2')->constrained('players')->onDelete('cascade');
            $table->boolean('is_accepted')->default(false);
            $table->unique(['player_id_1', 'player_id_2']);

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friendships');
    }
}
