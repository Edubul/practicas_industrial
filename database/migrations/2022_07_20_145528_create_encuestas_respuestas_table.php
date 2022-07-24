<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestas_respuestas', function (Blueprint $table) {
            $table->id();
            $table->string('num_control');
            $table->bigInteger('pregunta_id')->unsigned();
            $table->string('respuesta');
            $table->bigInteger('pregunta_id1')->unsigned();
            $table->string('respuesta1');
            $table->bigInteger('pregunta_id2')->unsigned();
            $table->string('respuesta2');
            $table->bigInteger('pregunta_id3')->unsigned();
            $table->string('respuesta3');
            $table->bigInteger('pregunta_id4')->unsigned();
            $table->string('respuesta4');
            $table->bigInteger('pregunta_id5')->unsigned();
            $table->string('respuesta5');
            $table->bigInteger('pregunta_id6')->unsigned();
            $table->string('respuesta6');
            $table->bigInteger('pregunta_id7')->unsigned();
            $table->string('respuesta7');
            $table->bigInteger('pregunta_id8')->unsigned();
            $table->string('respuesta8');
            $table->bigInteger('pregunta_id9')->unsigned();
            $table->string('respuesta9');
            $table->timestamps();
        });


        Schema::table('encuestas_respuestas', function (Blueprint $table) {
            // FK
            $table->foreign('pregunta_id')->references('id')->on('preguntas_encuesta');
            $table->foreign('pregunta_id1')->references('id')->on('preguntas_encuesta');
            $table->foreign('pregunta_id2')->references('id')->on('preguntas_encuesta');
            $table->foreign('pregunta_id3')->references('id')->on('preguntas_encuesta');
            $table->foreign('pregunta_id4')->references('id')->on('preguntas_encuesta');
            $table->foreign('pregunta_id5')->references('id')->on('preguntas_encuesta');
            $table->foreign('pregunta_id6')->references('id')->on('preguntas_encuesta');
            $table->foreign('pregunta_id7')->references('id')->on('preguntas_encuesta');
            $table->foreign('pregunta_id8')->references('id')->on('preguntas_encuesta');
            $table->foreign('pregunta_id9')->references('id')->on('preguntas_encuesta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuestas_respuestas');
    }
};
