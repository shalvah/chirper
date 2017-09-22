<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChirpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('chirps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->unsignedInteger('user_id');
            $table->integer('likes_count')->default(0);
            $table->timestamp('posted_at');

            $table->foreign('user_id')->references('id')->on('users');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chirps');
    }
}
