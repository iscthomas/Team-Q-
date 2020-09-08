<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupHighscoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_highscores', function (Blueprint $table) {
            $table->integer('joined_group_id')->foreign('joined_group_id')->references('groups')->on('id')->onDelete('cascade');
            $table->integer('user_id')->foreign('user_id')->references('groups')->on('user_id')->onDelete('cascade');
            $table->bigInteger('highscore');
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
        Schema::dropIfExists('group_highscores');
    }
}
