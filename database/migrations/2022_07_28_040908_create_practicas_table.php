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
        Schema::create('practicas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('profesores')->nullable(true);
            $table->string('materia');
            $table->string('unidad');
            $table->string('tema');
            $table->string('nombre_practica');
            $table->string('atributo_egreso');
            $table->string('req_ub_op1');
            $table->string('req_ub_op2')->nullable(true);
            $table->string('equipo_prot');
            $table->string('maq_usar');
            $table->string('inst_med')->nullable(true);
            $table->string('material_didactico');
            $table->string('herr_man')->nullable(true);
            $table->string('herr_mec')->nullable(true);
            $table->string('recom_seguridad')->nullable(true);
            $table->string('objetivo');
            $table->string('pasos');
            $table->string('fuentes_info');
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
        Schema::dropIfExists('practicas');
    }
};
