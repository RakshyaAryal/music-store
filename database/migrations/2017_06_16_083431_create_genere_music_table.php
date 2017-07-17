<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenereMusicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genere_music', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('generes_id')->unsigned();
            $table->integer('music_id')->unsigned();

            $table->foreign('generes_id')->references('id')->on('generes');
            $table->foreign('music_id')->references('id')->on('music');


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
        Schema::dropIfExists('genere_music');
    }
}
