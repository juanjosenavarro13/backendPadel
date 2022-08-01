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
            $table->unsignedBigInteger('pista_id')->default(null)->nullable();
            $table->foreign('pista_id')->references('id')->on('pistas')->onDelete('set null');
            $table->unsignedBigInteger('id_jugador1')->default(null)->nullable();
            $table->foreign('id_jugador1')->references('id')->on('usuarios')->onDelete('set null');
            $table->unsignedBigInteger('id_jugador2')->default(null)->nullable();
            $table->foreign('id_jugador2')->references('id')->on('usuarios')->onDelete('set null');
            $table->unsignedBigInteger('id_jugador3')->default(null)->nullable();
            $table->foreign('id_jugador3')->references('id')->on('usuarios')->onDelete('set null');
            $table->unsignedBigInteger('id_jugador4')->default(null)->nullable();
            $table->foreign('id_jugador4')->references('id')->on('usuarios')->onDelete('set null');
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
