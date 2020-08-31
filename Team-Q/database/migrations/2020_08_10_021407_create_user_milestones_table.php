<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMilestonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_milestones', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('game_id')->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->string('user_highscore');
            $table->timestamp('date');
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
        Schema::dropIfExists('user_milestones');
    }
}
