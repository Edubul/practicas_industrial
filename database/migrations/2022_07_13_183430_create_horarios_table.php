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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->string('horario');
            $table->timestamps();
        });


        Schema::table('practicas', function (Blueprint $table) {
            // FK
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('taller_id')->references('id')->on('talleres');
            $table->foreign('horario_id')->references('id')->on('horarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
};
