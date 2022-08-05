<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Partidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha');
            $table->unsignedBigInteger('pista_id');
            $table->foreign('pista_id')->references('id')->on('pistas')->onDelete('cascade');
            $table->unsignedBigInteger('id_jugador1');
            $table->foreign('id_jugador1')->references('id')->on('usuarios')->onDelete('cascade');
            $table->unsignedBigInteger('id_jugador2');
            $table->foreign('id_jugador2')->references('id')->on('usuarios')->onDelete('cascade');
            $table->unsignedBigInteger('id_jugador3');
            $table->foreign('id_jugador3')->references('id')->on('usuarios')->onDelete('cascade');
            $table->unsignedBigInteger('id_jugador4');
            $table->foreign('id_jugador4')->references('id')->on('usuarios')->onDelete('cascade');
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
        Schema::dropIfExists('partidos');
    }
}
