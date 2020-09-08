<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('real_name')->nullable();
            $table->text('favourite_games')->nullable();
            $table->boolean('profile_visibility')->default('1')->nullable();
            $table->string('location')->nullable();
            $table->string('about_me')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('user_id')->foreign('user_id')->references('users')->on('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
